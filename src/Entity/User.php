<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"username"}, message="There is already an account with this username")
 * @ORM\Table(name="acces")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LoginType", inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Etudiant", mappedBy="login", cascade={"persist", "remove"})
     */
    private $etudiant;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Enseignant", mappedBy="login", cascade={"persist", "remove"})
     */
    private $enseignant;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Information", mappedBy="user")
     */
    private $informations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\InformationChild", mappedBy="user")
     */
    private $informationChildren;

    public function __construct()
    {
        $this->informations = new ArrayCollection();
        $this->informationChildren = new ArrayCollection();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieu_naissance;
    }

    public function setLieuNaissance(string $lieu_naissance): self
    {
        $this->lieu_naissance = $lieu_naissance;

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

    public function getType(): ?LoginType
    {
        return $this->type;
    }

    public function setType(?LoginType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getEtudiant(): ?Etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?Etudiant $etudiant): self
    {
        $this->etudiant = $etudiant;

        // set (or unset) the owning side of the relation if necessary
        $newLogin = $etudiant === null ? null : $this;
        if ($newLogin !== $etudiant->getLogin()) {
            $etudiant->setLogin($newLogin);
        }

        return $this;
    }

    public function getEnseignant(): ?Enseignant
    {
        return $this->enseignant;
    }

    public function setEnseignant(?Enseignant $enseignant): self
    {
        $this->enseignant = $enseignant;

        // set (or unset) the owning side of the relation if necessary
        $newLogin = $enseignant === null ? null : $this;
        if ($newLogin !== $enseignant->getLogin()) {
            $enseignant->setLogin($newLogin);
        }

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @return Collection|Information[]
     */
    public function getInformations(): Collection
    {
        return $this->informations;
    }

    public function addInformation(Information $information): self
    {
        if (!$this->informations->contains($information)) {
            $this->informations[] = $information;
            $information->setUser($this);
        }

        return $this;
    }

    public function removeInformation(Information $information): self
    {
        if ($this->informations->contains($information)) {
            $this->informations->removeElement($information);
            // set the owning side to null (unless already changed)
            if ($information->getUser() === $this) {
                $information->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|InformationChild[]
     */
    public function getInformationChildren(): Collection
    {
        return $this->informationChildren;
    }

    public function addInformationChild(InformationChild $informationChild): self
    {
        if (!$this->informationChildren->contains($informationChild)) {
            $this->informationChildren[] = $informationChild;
            $informationChild->setUser($this);
        }

        return $this;
    }

    public function removeInformationChild(InformationChild $informationChild): self
    {
        if ($this->informationChildren->contains($informationChild)) {
            $this->informationChildren->removeElement($informationChild);
            // set the owning side to null (unless already changed)
            if ($informationChild->getUser() === $this) {
                $informationChild->setUser(null);
            }
        }

        return $this;
    }
}
