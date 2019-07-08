<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeParcoursRepository")
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

    public function __construct()
    {
        $this->niveauxs = new ArrayCollection();
        $this->etudiants = new ArrayCollection();
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
}
