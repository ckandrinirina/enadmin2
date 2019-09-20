<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NoteRepository")
 * @ORM\Table(name="note")
 */
class Note
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Etudiant", inversedBy="notes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etudiant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EC", inversedBy="notes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $EC;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Semestre", inversedBy="notes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $semestre;

    /**
     * @ORM\Column(type="float")
     */
    private $valeur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isRatrapage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AnneUniversitaire", inversedBy="notes")
     */
    private $anneUniversitaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Niveaux", inversedBy="notes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $niveaux;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isValide;

    /**
     * @ORM\Column(type="float")
     */
    private $value_coeff;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NoteUc", inversedBy="notes")
     */
    private $note_uc;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_final;

    public function __construct()
    {
        $this->ficheIndividuels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEC(): ?EC
    {
        return $this->EC;
    }

    public function setEC(?EC $EC): self
    {
        $this->EC = $EC;

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

    public function getValeur(): ?float
    {
        return $this->valeur;
    }

    public function setValeur(float $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }

    public function getIsRatrapage(): ?bool
    {
        return $this->isRatrapage;
    }

    public function setIsRatrapage(bool $isRatrapage): self
    {
        $this->isRatrapage = $isRatrapage;

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

    /**
     * @return Collection|FicheIndividuel[]
     */
    public function getFicheIndividuels(): Collection
    {
        return $this->ficheIndividuels;
    }

    public function addFicheIndividuel(FicheIndividuel $ficheIndividuel): self
    {
        if (!$this->ficheIndividuels->contains($ficheIndividuel)) {
            $this->ficheIndividuels[] = $ficheIndividuel;
            $ficheIndividuel->setNote($this);
        }

        return $this;
    }

    public function removeFicheIndividuel(FicheIndividuel $ficheIndividuel): self
    {
        if ($this->ficheIndividuels->contains($ficheIndividuel)) {
            $this->ficheIndividuels->removeElement($ficheIndividuel);
            // set the owning side to null (unless already changed)
            if ($ficheIndividuel->getNote() === $this) {
                $ficheIndividuel->setNote(null);
            }
        }

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

    public function getValueCoeff(): ?float
    {
        return $this->value_coeff;
    }

    public function setValueCoeff(float $value_coeff): self
    {
        $this->value_coeff = $value_coeff;

        return $this;
    }

    public function getNoteUc(): ?NoteUc
    {
        return $this->note_uc;
    }

    public function setNoteUc(?NoteUc $note_uc): self
    {
        $this->note_uc = $note_uc;

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
