<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnneUniversitaireRepository")
 * @ORM\Table(name="anne_universitaire")
 */
class AnneUniversitaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $anneUniversitaire;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Etudiant", mappedBy="anneUniversitaire")
     */
    private $etudiants;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Note", mappedBy="anneUniversitaire")
     */
    private $notes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FicheIndividuel", mappedBy="anneUniversitaire")
     */
    private $ficheIndividuels;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NoteUc", mappedBy="anneUniversitaire")
     */
    private $noteUcs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Moyenne", mappedBy="anneUniversitaire")
     */
    private $moyennes;

    public function __construct()
    {
        $this->etudiants = new ArrayCollection();
        $this->notes = new ArrayCollection();
        $this->ficheIndividuels = new ArrayCollection();
        $this->noteUcs = new ArrayCollection();
        $this->moyennes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnneUniversitaire(): ?string
    {
        return $this->anneUniversitaire;
    }

    public function setAnneUniversitaire(string $anneUniversitaire): self
    {
        $this->anneUniversitaire = $anneUniversitaire;

        return $this;
    }

    /**
     * @return Collection|Etudiant[]
     */
    public function getEtudiants(): Collection
    {
        return $this->etudiants;
    }

    public function addEtudiant(Etudiant $etudiant): self
    {
        if (!$this->etudiants->contains($etudiant)) {
            $this->etudiants[] = $etudiant;
            $etudiant->setAnneUniversitaire($this);
        }

        return $this;
    }

    public function removeEtudiant(Etudiant $etudiant): self
    {
        if ($this->etudiants->contains($etudiant)) {
            $this->etudiants->removeElement($etudiant);
            // set the owning side to null (unless already changed)
            if ($etudiant->getAnneUniversitaire() === $this) {
                $etudiant->setAnneUniversitaire(null);
            }
        }

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
            $note->setAnneUniversitaire($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->contains($note)) {
            $this->notes->removeElement($note);
            // set the owning side to null (unless already changed)
            if ($note->getAnneUniversitaire() === $this) {
                $note->setAnneUniversitaire(null);
            }
        }

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
            $ficheIndividuel->setAnneUniversitaire($this);
        }

        return $this;
    }

    public function removeFicheIndividuel(FicheIndividuel $ficheIndividuel): self
    {
        if ($this->ficheIndividuels->contains($ficheIndividuel)) {
            $this->ficheIndividuels->removeElement($ficheIndividuel);
            // set the owning side to null (unless already changed)
            if ($ficheIndividuel->getAnneUniversitaire() === $this) {
                $ficheIndividuel->setAnneUniversitaire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|NoteUc[]
     */
    public function getNoteUcs(): Collection
    {
        return $this->noteUcs;
    }

    public function addNoteUc(NoteUc $noteUc): self
    {
        if (!$this->noteUcs->contains($noteUc)) {
            $this->noteUcs[] = $noteUc;
            $noteUc->setAnneUniversitaire($this);
        }

        return $this;
    }

    public function removeNoteUc(NoteUc $noteUc): self
    {
        if ($this->noteUcs->contains($noteUc)) {
            $this->noteUcs->removeElement($noteUc);
            // set the owning side to null (unless already changed)
            if ($noteUc->getAnneUniversitaire() === $this) {
                $noteUc->setAnneUniversitaire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Moyenne[]
     */
    public function getMoyennes(): Collection
    {
        return $this->moyennes;
    }

    public function addMoyenne(Moyenne $moyenne): self
    {
        if (!$this->moyennes->contains($moyenne)) {
            $this->moyennes[] = $moyenne;
            $moyenne->setAnneUniversitaire($this);
        }

        return $this;
    }

    public function removeMoyenne(Moyenne $moyenne): self
    {
        if ($this->moyennes->contains($moyenne)) {
            $this->moyennes->removeElement($moyenne);
            // set the owning side to null (unless already changed)
            if ($moyenne->getAnneUniversitaire() === $this) {
                $moyenne->setAnneUniversitaire(null);
            }
        }

        return $this;
    }
}
