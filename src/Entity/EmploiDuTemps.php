<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmploiDuTempsRepository")
 * @ORM\Table(name="emploi_du_temps")
 */
class EmploiDuTemps
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Jours", inversedBy="emploiDuTemps")
     */
    private $jour;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Heures", inversedBy="emploiDuTemps")
     */
    private $heure;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Niveaux", inversedBy="emploiDuTemps")
     */
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EC", inversedBy="emploiDuTemps")
     */
    private $ec;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Semestre", inversedBy="emploiDuTemps")
     */
    private $semestre;

    public function __construct()
    {
        $this->jours = new ArrayCollection();
        $this->heures = new ArrayCollection();
        $this->niveaux = new ArrayCollection();
        $this->ecs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Jours[]
     */
    public function getJours(): Collection
    {
        return $this->jours;
    }

    public function addJour(Jours $jour): self
    {
        if (!$this->jours->contains($jour)) {
            $this->jours[] = $jour;
        }

        return $this;
    }

    public function removeJour(Jours $jour): self
    {
        if ($this->jours->contains($jour)) {
            $this->jours->removeElement($jour);
        }

        return $this;
    }

    /**
     * @return Collection|Heures[]
     */
    public function getHeures(): Collection
    {
        return $this->heures;
    }

    public function addHeure(Heures $heure): self
    {
        if (!$this->heures->contains($heure)) {
            $this->heures[] = $heure;
        }

        return $this;
    }

    public function removeHeure(Heures $heure): self
    {
        if ($this->heures->contains($heure)) {
            $this->heures->removeElement($heure);
        }

        return $this;
    }

    /**
     * @return Collection|Niveaux[]
     */
    public function getNiveaux(): Collection
    {
        return $this->niveaux;
    }

    public function addNiveau(Niveaux $niveau): self
    {
        if (!$this->niveaux->contains($niveau)) {
            $this->niveaux[] = $niveau;
            $niveau->setEmploiDuTemps($this);
        }

        return $this;
    }

    public function removeNiveau(Niveaux $niveau): self
    {
        if ($this->niveaux->contains($niveau)) {
            $this->niveaux->removeElement($niveau);
            // set the owning side to null (unless already changed)
            if ($niveau->getEmploiDuTemps() === $this) {
                $niveau->setEmploiDuTemps(null);
            }
        }

        return $this;
    }

    public function getNiveau(): ?Niveaux
    {
        return $this->niveau;
    }

    public function setNiveau(?Niveaux $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * @return Collection|EC[]
     */
    public function getEcs(): Collection
    {
        return $this->ecs;
    }

    public function addEc(EC $ec): self
    {
        if (!$this->ecs->contains($ec)) {
            $this->ecs[] = $ec;
        }

        return $this;
    }

    public function removeEc(EC $ec): self
    {
        if ($this->ecs->contains($ec)) {
            $this->ecs->removeElement($ec);
        }

        return $this;
    }

    public function getJour(): ?Jours
    {
        return $this->jour;
    }

    public function setJour(?Jours $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getHeure(): ?Heures
    {
        return $this->heure;
    }

    public function setHeure(?Heures $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getEc(): ?EC
    {
        return $this->ec;
    }

    public function setEc(?EC $ec): self
    {
        $this->ec = $ec;

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
}
