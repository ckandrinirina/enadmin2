<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScolariteRepository")
 */
class Scolarite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Etudiant", inversedBy="scolarite", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $etudiant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroInscription;

    /**
     * @ORM\Column(type="date")
     */
    private $dateInscription;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Droit", inversedBy="scolarites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $droit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtudiant(): ?Etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(Etudiant $etudiant): self
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    public function getNumeroInscription(): ?string
    {
        return $this->numeroInscription;
    }

    public function setNumeroInscription(string $numeroInscription): self
    {
        $this->numeroInscription = $numeroInscription;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getDroit(): ?Droit
    {
        return $this->droit;
    }

    public function setDroit(?Droit $droit): self
    {
        $this->droit = $droit;

        return $this;
    }
}
