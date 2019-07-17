<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Niveaux", inversedBy="scolarite", cascade={"persist", "remove"})
     */
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Etudiant", inversedBy="scolarites")
     */
    private $etudiant;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ScolariteImage", mappedBy="scolarites")
     */
    private $scolariteImages;

    public function __construct()
    {
        $this->scolariteImages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNiveau(): ?Niveaux
    {
        return $this->niveau;
    }

    public function setNiveau(?Niveaux $niveau): self
    {
        $this->niveau = $niveau;

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

    /**
     * @return Collection|ScolariteImage[]
     */
    public function getScolariteImages(): Collection
    {
        return $this->scolariteImages;
    }

    public function addScolariteImage(ScolariteImage $scolariteImage): self
    {
        if (!$this->scolariteImages->contains($scolariteImage)) {
            $this->scolariteImages[] = $scolariteImage;
            $scolariteImage->setScolarites($this);
        }

        return $this;
    }

    public function removeScolariteImage(ScolariteImage $scolariteImage): self
    {
        if ($this->scolariteImages->contains($scolariteImage)) {
            $this->scolariteImages->removeElement($scolariteImage);
            // set the owning side to null (unless already changed)
            if ($scolariteImage->getScolarites() === $this) {
                $scolariteImage->setScolarites(null);
            }
        }

        return $this;
    }
}
