<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeParcoursRepository")
 * @ORM\Table(name="type_parcour")
 */
class TypeParcours
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
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Niveaux", mappedBy="type")
     */
    private $niveauxs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Etudiant", mappedBy="parcour")
     */
    private $etudiants;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Salle", mappedBy="parcour")
     */
    private $salles;

    public function __construct()
    {
        $this->niveauxs = new ArrayCollection();
        $this->etudiants = new ArrayCollection();
        $this->salles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Niveaux[]
     */
    public function getNiveauxs(): Collection
    {
        return $this->niveauxs;
    }

    public function addNiveaux(Niveaux $niveaux): self
    {
        if (!$this->niveauxs->contains($niveaux)) {
            $this->niveauxs[] = $niveaux;
            $niveaux->setType($this);
        }

        return $this;
    }

    public function removeNiveaux(Niveaux $niveaux): self
    {
        if ($this->niveauxs->contains($niveaux)) {
            $this->niveauxs->removeElement($niveaux);
            // set the owning side to null (unless already changed)
            if ($niveaux->getType() === $this) {
                $niveaux->setType(null);
            }
        }

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
            $etudiant->setParcour($this);
        }

        return $this;
    }

    public function removeEtudiant(Etudiant $etudiant): self
    {
        if ($this->etudiants->contains($etudiant)) {
            $this->etudiants->removeElement($etudiant);
            // set the owning side to null (unless already changed)
            if ($etudiant->getParcour() === $this) {
                $etudiant->setParcour(null);
            }
        }

        return $this;
    }

    public function getSalle(): ?Salle
    {
        return $this->salle;
    }

    public function setSalle(?Salle $salle): self
    {
        $this->salle = $salle;

        // set (or unset) the owning side of the relation if necessary
        $newParcour = $salle === null ? null : $this;
        if ($newParcour !== $salle->getParcour()) {
            $salle->setParcour($newParcour);
        }

        return $this;
    }

    /**
     * @return Collection|Salle[]
     */
    public function getSalles(): Collection
    {
        return $this->salles;
    }

    public function addSalle(Salle $salle): self
    {
        if (!$this->salles->contains($salle)) {
            $this->salles[] = $salle;
            $salle->setParcour($this);
        }

        return $this;
    }

    public function removeSalle(Salle $salle): self
    {
        if ($this->salles->contains($salle)) {
            $this->salles->removeElement($salle);
            // set the owning side to null (unless already changed)
            if ($salle->getParcour() === $this) {
                $salle->setParcour(null);
            }
        }

        return $this;
    }
}
