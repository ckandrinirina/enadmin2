<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NoteUcRepository")
 * @ORM\Table(name="note_uc")
 */
class NoteUc
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UC", inversedBy="noteUcs")
     */
    private $uc;

    /**
     * @ORM\Column(type="float")
     */
    private $value_coeff;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Etudiant", inversedBy="noteUcs")
     */
    private $etudiant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Semestre", inversedBy="noteUcs")
     */
    private $semestre;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isRatarapage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AnneUniversitaire", inversedBy="noteUcs")
     */
    private $anneUniversitaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Niveaux", inversedBy="noteUcs")
     */
    private $niveaux;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isValide;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Note", mappedBy="note_uc")
     */
    private $notes;

    /**
     * @ORM\Column(type="integer")
     */
    private $credit;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_final;

    public function __construct()
    {
        $this->notes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUc(): ?UC
    {
        return $this->uc;
    }

    public function setUc(?UC $uc): self
    {
        $this->uc = $uc;

        return $this;
    }

    public function getValueCoeff(): ?float
    {
        return $this->value_coeff;
    }

    public function setValueCoeff(float $value_coeff): self
    {
        $this->value_coeff = $value_coeff;

        return $this;
    }

    public function getEtudiant(): ?Etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?Etudiant $etudiant): self
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    public function getSemestre(): ?Semestre
    {
        return $this->semestre;
    }

    public function setSemestre(?Semestre $semestre): self
    {
        $this->semestre = $semestre;

        return $this;
    }

    public function getIsRatarapage(): ?bool
    {
        return $this->isRatarapage;
    }

    public function setIsRatarapage(bool $isRatarapage): self
    {
        $this->isRatarapage = $isRatarapage;

        return $this;
    }

    public function getAnneUniversitaire(): ?AnneUniversitaire
    {
        return $this->anneUniversitaire;
    }

    public function setAnneUniversitaire(?AnneUniversitaire $anneUniversitaire): self
    {
        $this->anneUniversitaire = $anneUniversitaire;

        return $this;
    }

    public function getNiveaux(): ?Niveaux
    {
        return $this->niveaux;
    }

    public function setNiveaux(?Niveaux $niveaux): self
    {
        $this->niveaux = $niveaux;

        return $this;
    }

    public function getIsValide(): ?bool
    {
        return $this->isValide;
    }

    public function setIsValide(bool $isValide): self
    {
        $this->isValide = $isValide;

        return $this;
    }

    /**
     * @return Collection|Note[]
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): self
    {
        if (!$this->notes->contains($note)) {
            $this->notes[] = $note;
            $note->setNoteUc($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->contains($note)) {
            $this->notes->removeElement($note);
            // set the owning side to null (unless already changed)
            if ($note->getNoteUc() === $this) {
                $note->setNoteUc(null);
            }
        }

        return $this;
    }

    public function getCredit(): ?int
    {
        return $this->credit;
    }

    public function setCredit(int $credit): self
    {
        $this->credit = $credit;

        return $this;
    }

    public function getIsFinal(): ?bool
    {
        return $this->is_final;
    }

    public function setIsFinal(bool $is_final): self
    {
        $this->is_final = $is_final;

        return $this;
    }
}
