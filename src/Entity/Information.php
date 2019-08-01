<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InformationRepository")
 */
class Information
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Niveaux", inversedBy="informations")
     */
    private $niveaux;

    /**
     * @ORM\Column(type="datetime")
     */
    private $addAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="informations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
        $this->niveaux = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

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
        }

        return $this;
    }

    public function removeNiveau(Niveaux $niveau): self
    {
        if ($this->niveaux->contains($niveau)) {
            $this->niveaux->removeElement($niveau);
        }

        return $this;
    }

    public function getAddAt(): ?\DateTimeInterface
    {
        return $this->addAt;
    }

    public function setAddAt(\DateTimeInterface $addAt): self
    {
        $this->addAt = $addAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
