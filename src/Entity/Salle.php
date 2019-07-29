<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SalleRepository")
 */
class Salle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Niveaux", inversedBy="salles")
     */
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Semestre", inversedBy="salles")
     */
    private $semestre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeParcours", inversedBy="salles")
     */
    private $parcour;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\SalleClass", inversedBy="salle", cascade={"persist", "remove"})
     */
    private $salle_class;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSemestre(): ?Semestre
    {
        return $this->semestre;
    }

    public function setSemestre(?Semestre $semestre): self
    {
        $this->semestre = $semestre;

        return $this;
    }

    public function getParcour(): ?TypeParcours
    {
        return $this->parcour;
    }

    public function setParcour(?TypeParcours $parcour): self
    {
        $this->parcour = $parcour;

        return $this;
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

    public function getSalleClass(): ?SalleClass
    {
        return $this->salle_class;
    }

    public function setSalleClass(?SalleClass $salle_class): self
    {
        $this->salle_class = $salle_class;

        return $this;
    }

}
