<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SalleClassRepository")
 */
class SalleClass
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
    private $nom;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Salle", mappedBy="salle_class", cascade={"persist", "remove"})
     */
    private $salle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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
        $newSalle_class = $salle === null ? null : $this;
        if ($newSalle_class !== $salle->getSalleClass()) {
            $salle->setSalleClass($newSalle_class);
        }

        return $this;
    }
}
