<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EnseignantRepository")
 * @ORM\Table(name="enseignant")
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
     * @Assert\NotBlank(message="Champ obligatoire")
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Champ obligatoire")
     */
    private $contact;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Champ obligatoire")
     */
    private $adresse;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="Champ obligatoire")
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
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="enseignant", cascade={"persist"})
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     * 
     * @Assert\NotBlank(message="Atention inserer une image uniquemement.")
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $photo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EC", mappedBy="enseignant")
     */
    private $eCs;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Parametrage", mappedBy="chefmention", cascade={"persist", "remove"})
     */
    private $parametrage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contact2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contact3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Champ obligatoire")
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Champ obligatoire")
     */
    private $matricule;

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

    public function getParametrage(): ?Parametrage
    {
        return $this->parametrage;
    }

    public function setParametrage(?Parametrage $parametrage): self
    {
        $this->parametrage = $parametrage;

        // set (or unset) the owning side of the relation if necessary
        $newChefmention = $parametrage === null ? null : $this;
        if ($newChefmention !== $parametrage->getChefmention()) {
            $parametrage->setChefmention($newChefmention);
        }

        return $this;
    }

    public function getContact2(): ?string
    {
        return $this->contact2;
    }

    public function setContact2(?string $contact2): self
    {
        $this->contact2 = $contact2;

        return $this;
    }

    public function getContact3(): ?string
    {
        return $this->contact3;
    }

    public function setContact3(?string $contact3): self
    {
        $this->contact3 = $contact3;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(?string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }
}
