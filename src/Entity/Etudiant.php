<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EtudiantRepository")
 * * @ORM\Table(name="etudiant")
 */
class Etudiant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="Le contenu nom ne peut pas être vide")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="Le contenu prenom ne peut pas être vide")
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Assert\NotBlank(message="Atention inserer une image uniquemement.")
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le contenu pere ne peut pas être vide")
     */
    private $pere;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le contenu profession pere ne peut pas être vide")
     */
    private $professionPere;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le contenu mere ne peut pas être vide")
     */
    private $mere;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le contenu profession mere ne peut pas être vide")
     */
    private $professionMere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contact;

    /**
     * @ORM\Column(type="date")
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le contenu lieu de naissance ne peut pas être vide")
     */
    private $lieuxNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le contenu adresse ne peut pas être vide")
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $anneEntre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sexe", inversedBy="etudiants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sexe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Niveaux", inversedBy="etudiants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $niveaux;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AnneUniversitaire", inversedBy="etudiants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $anneUniversitaire;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Note", mappedBy="etudiant")
     */
    private $notes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FicheIndividuel", mappedBy="etudiant")
     */
    private $ficheIndividuels;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="etudiant", cascade={"persist","remove"})
     */
    private $login;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeParcours", inversedBy="etudiants")
     */
    private $parcour;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isSortant;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NoteUc", mappedBy="etudiant")
     */
    private $noteUcs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Scolarite", mappedBy="etudiant")
     */
    private $scolarites;


    public function __construct()
    {
        $this->notes = new ArrayCollection();
        $this->ficheIndividuels = new ArrayCollection();
        $this->noteUcs = new ArrayCollection();
        $this->scolarites = new ArrayCollection();
        $this->information = new ArrayCollection();
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

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPere(): ?string
    {
        return $this->pere;
    }

    public function setPere(string $pere): self
    {
        $this->pere = $pere;

        return $this;
    }

    public function getProfessionPere(): ?string
    {
        return $this->professionPere;
    }

    public function setProfessionPere(string $professionPere): self
    {
        $this->professionPere = $professionPere;

        return $this;
    }

    public function getMere(): ?string
    {
        return $this->mere;
    }

    public function setMere(string $mere): self
    {
        $this->mere = $mere;

        return $this;
    }

    public function getProfessionMere(): ?string
    {
        return $this->professionMere;
    }

    public function setProfessionMere(string $professionMere): self
    {
        $this->professionMere = $professionMere;

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

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getAnneEntre(): ?string
    {
        return $this->anneEntre;
    }

    public function setAnneEntre(string $anneEntre): self
    {
        $this->anneEntre = $anneEntre;

        return $this;
    }

    public function getSexe(): ?Sexe
    {
        return $this->sexe;
    }

    public function setSexe(?Sexe $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getNiveaux(): ?Niveaux
    {
        return $this->niveaux;
    }

    public function setNiveaux(?Niveaux $niveaux): self
    {
        $this->niveaux = $niveaux;

        return $this;
    }

    public function getAnneUniversitaire(): ?AnneUniversitaire
    {
        return $this->anneUniversitaire;
    }

    public function setAnneUniversitaire(?AnneUniversitaire $anneUniversitaire): self
    {
        $this->anneUniversitaire = $anneUniversitaire;

        return $this;
    }

    /**
     * @return Collection|Note[]
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): self
    {
        if (!$this->notes->contains($note)) {
            $this->notes[] = $note;
            $note->setEtudiant($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->contains($note)) {
            $this->notes->removeElement($note);
            // set the owning side to null (unless already changed)
            if ($note->getEtudiant() === $this) {
                $note->setEtudiant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FicheIndividuel[]
     */
    public function getFicheIndividuels(): Collection
    {
        return $this->ficheIndividuels;
    }

    public function addFicheIndividuel(FicheIndividuel $ficheIndividuel): self
    {
        if (!$this->ficheIndividuels->contains($ficheIndividuel)) {
            $this->ficheIndividuels[] = $ficheIndividuel;
            $ficheIndividuel->setEtudiant($this);
        }

        return $this;
    }

    public function removeFicheIndividuel(FicheIndividuel $ficheIndividuel): self
    {
        if ($this->ficheIndividuels->contains($ficheIndividuel)) {
            $this->ficheIndividuels->removeElement($ficheIndividuel);
            // set the owning side to null (unless already changed)
            if ($ficheIndividuel->getEtudiant() === $this) {
                $ficheIndividuel->setEtudiant(null);
            }
        }

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

    public function getParcour(): ?TypeParcours
    {
        return $this->parcour;
    }

    public function setParcour(?TypeParcours $parcour): self
    {
        $this->parcour = $parcour;

        return $this;
    }

    public function getIsSortant(): ?bool
    {
        return $this->isSortant;
    }

    public function setIsSortant(?bool $isSortant): self
    {
        $this->isSortant = $isSortant;

        return $this;
    }

    /**
     * @return Collection|NoteUc[]
     */
    public function getNoteUcs(): Collection
    {
        return $this->noteUcs;
    }

    public function addNoteUc(NoteUc $noteUc): self
    {
        if (!$this->noteUcs->contains($noteUc)) {
            $this->noteUcs[] = $noteUc;
            $noteUc->setEtudiant($this);
        }

        return $this;
    }

    public function removeNoteUc(NoteUc $noteUc): self
    {
        if ($this->noteUcs->contains($noteUc)) {
            $this->noteUcs->removeElement($noteUc);
            // set the owning side to null (unless already changed)
            if ($noteUc->getEtudiant() === $this) {
                $noteUc->setEtudiant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Scolarite[]
     */
    public function getScolarites(): Collection
    {
        return $this->scolarites;
    }

    public function addScolarite(Scolarite $scolarite): self
    {
        if (!$this->scolarites->contains($scolarite)) {
            $this->scolarites[] = $scolarite;
            $scolarite->setEtudiant($this);
        }

        return $this;
    }

    public function removeScolarite(Scolarite $scolarite): self
    {
        if ($this->scolarites->contains($scolarite)) {
            $this->scolarites->removeElement($scolarite);
            // set the owning side to null (unless already changed)
            if ($scolarite->getEtudiant() === $this) {
                $scolarite->setEtudiant(null);
            }
        }

        return $this;
    }
}
