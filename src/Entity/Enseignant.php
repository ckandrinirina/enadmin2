<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EnseignantRepository")
 */
class Enseignant
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
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieuxNaissance;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EnseignantType", inversedBy="enseignants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="enseignant", cascade={"persist","remove"})
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EC", mappedBy="enseignant")
     */
    private $eCs;

    public function __construct()
    {
        $this->eCs = new ArrayCollection();
    }

    /**
     * @return Collection|EC[]
     */
    public function getECs(): Collection
    {
        return $this->eCs;
    }

    public function addEC(EC $eC): self
    {
        if (!$this->eCs->contains($eC)) {
            $this->eCs[] = $eC;
            $eC->setEnseignants($this);
        }

        return $this;
    }

    public function removeEC(EC $eC): self
    {
        if ($this->eCs->contains($eC)) {
            $this->eCs->removeElement($eC);
            // set the owning side to null (unless already changed)
            if ($eC->getEnseignants() === $this) {
                $eC->setEnseignants(null);
            }
        }

        return $this;
    }

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getLieuxNaissance(): ?string
    {
        return $this->lieuxNaissance;
    }

    public function setLieuxNaissance(string $lieuxNaissance): self
    {
        $this->lieuxNaissance = $lieuxNaissance;

        return $this;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    public function getType(): ?EnseignantType
    {
        return $this->type;
    }

    public function setType(?EnseignantType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getLogin(): ?User
    {
        return $this->login;
    }

    public function setLogin(?User $login): self
    {
        $this->login = $login;

        return $this;
    }

}