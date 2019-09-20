<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HeuresRepository")
 * @ORM\Table(name="heures")
 */
class Heures
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
    private $heures;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EmploiDuTemps", mappedBy="heure")
     */
    private $emploiDuTemps;

    public function __construct()
    {
        $this->emploiDuTemps = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeures(): ?string
    {
        return $this->heures;
    }

    public function setHeures(string $heures): self
    {
        $this->heures = $heures;

        return $this;
    }

    /**
     * @return Collection|EmploiDuTemps[]
     */
    public function getEmploiDuTemps(): Collection
    {
        return $this->emploiDuTemps;
    }

    public function addEmploiDuTemp(EmploiDuTemps $emploiDuTemp): self
    {
        if (!$this->emploiDuTemps->contains($emploiDuTemp)) {
            $this->emploiDuTemps[] = $emploiDuTemp;
            $emploiDuTemp->addHeure($this);
        }

        return $this;
    }

    public function removeEmploiDuTemp(EmploiDuTemps $emploiDuTemp): self
    {
        if ($this->emploiDuTemps->contains($emploiDuTemp)) {
            $this->emploiDuTemps->removeElement($emploiDuTemp);
            $emploiDuTemp->removeHeure($this);
        }

        return $this;
    }
}
