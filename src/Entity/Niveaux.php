<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NiveauxRepository")
 */
class Niveaux
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
    public $niveau;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeParcours", inversedBy="niveauxs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Semestre", mappedBy="niveaux")
     */
    private $semestres;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Etudiant", mappedBy="niveaux")
     */
    private $etudiants;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RepartitionEC", mappedBy="niveaux", cascade={"persist"})
     */
    private $repartitionEC;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Note", mappedBy="niveaux")
     */
    private $notes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EmploiDuTemps", mappedBy="niveau")
     */
    private $emploiDuTemps;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\UC", inversedBy="niveaux")
     */
    private $uCs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NoteUc", mappedBy="niveaux")
     */
    private $noteUcs;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Salle", mappedBy="niveau")
     */
    private $salles;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Scolarite", mappedBy="niveau", cascade={"persist"})
     */
    private $scolarite;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Information", mappedBy="niveaux")
     */
    private $informations;


    public function __construct()
    {
        $this->semestres = new ArrayCollection();
        $this->etudiants = new ArrayCollection();
        $this->repartitionEC = new ArrayCollection();
        $this->notes = new ArrayCollection();
        $this->emploiDuTemps = new ArrayCollection();
        $this->uCs = new ArrayCollection();
        $this->noteUcs = new ArrayCollection();
        $this->salles = new ArrayCollection();
        $this->informations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getType(): ?TypeParcours
    {
        return $this->type;
    }

    public function setType(?TypeParcours $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Semestre[]
     */
    public function getSemestres(): Collection
    {
        return $this->semestres;
    }

    public function addSemestre(Semestre $semestre): self
    {
        if (!$this->semestres->contains($semestre)) {
            $this->semestres[] = $semestre;
            $semestre->addNiveau($this);
        }

        return $this;
    }

    public function removeSemestre(Semestre $semestre): self
    {
        if ($this->semestres->contains($semestre)) {
            $this->semestres->removeElement($semestre);
            $semestre->removeNiveau($this);
        }

        return $this;
    }

    /**
     * @return Collection|Etudiant[]
     */
    public function getEtudiants(): Collection
    {
        return $this->etudiants;
    }

    public function addEtudiant(Etudiant $etudiant): self
    {
        if (!$this->etudiants->contains($etudiant)) {
            $this->etudiants[] = $etudiant;
            $etudiant->setNiveaux($this);
        }

        return $this;
    }

    public function removeEtudiant(Etudiant $etudiant): self
    {
        if ($this->etudiants->contains($etudiant)) {
            $this->etudiants->removeElement($etudiant);
            // set the owning side to null (unless already changed)
            if ($etudiant->getNiveaux() === $this) {
                $etudiant->setNiveaux(null);
            }
        }

        return $this;
    }

    public function getRepartitionEC(): ?RepartitionEC
    {
        return $this->repartitionEC;
    }

    public function setRepartitionEC(RepartitionEC $repartitionEC): self
    {
        $this->repartitionEC = $repartitionEC;

        // set the owning side of the relation if necessary
        if ($this !== $repartitionEC->getNiveaux()) {
            $repartitionEC->setNiveaux($this);
        }

        return $this;
    }

    public function addRepartitionEC(RepartitionEC $repartitionEC): self
    {
        if (!$this->repartitionEC->contains($repartitionEC)) {
            $this->repartitionEC[] = $repartitionEC;
            $repartitionEC->setNiveaux($this);
        }

        return $this;
    }

    public function removeRepartitionEC(RepartitionEC $repartitionEC): self
    {
        if ($this->repartitionEC->contains($repartitionEC)) {
            $this->repartitionEC->removeElement($repartitionEC);
            // set the owning side to null (unless already changed)
            if ($repartitionEC->getNiveaux() === $this) {
                $repartitionEC->setNiveaux(null);
            }
        }

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
            $note->setNiveaux($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->contains($note)) {
            $this->notes->removeElement($note);
            // set the owning side to null (unless already changed)
            if ($note->getNiveaux() === $this) {
                $note->setNiveaux(null);
            }
        }

        return $this;
    }

    public function getEmploiDuTemps(): ?EmploiDuTemps
    {
        return $this->emploiDuTemps;
    }

    public function setEmploiDuTemps(?EmploiDuTemps $emploiDuTemps): self
    {
        $this->emploiDuTemps = $emploiDuTemps;

        return $this;
    }

    public function addEmploiDuTemp(EmploiDuTemps $emploiDuTemp): self
    {
        if (!$this->emploiDuTemps->contains($emploiDuTemp)) {
            $this->emploiDuTemps[] = $emploiDuTemp;
            $emploiDuTemp->setNiveau($this);
        }

        return $this;
    }

    public function removeEmploiDuTemp(EmploiDuTemps $emploiDuTemp): self
    {
        if ($this->emploiDuTemps->contains($emploiDuTemp)) {
            $this->emploiDuTemps->removeElement($emploiDuTemp);
            // set the owning side to null (unless already changed)
            if ($emploiDuTemp->getNiveau() === $this) {
                $emploiDuTemp->setNiveau(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UC[]
     */
    public function getUCs(): Collection
    {
        return $this->uCs;
    }

    public function addUC(UC $uC): self
    {
        if (!$this->uCs->contains($uC)) {
            $this->uCs[] = $uC;
        }

        return $this;
    }

    public function removeUC(UC $uC): self
    {
        if ($this->uCs->contains($uC)) {
            $this->uCs->removeElement($uC);
        }

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
            $noteUc->setNiveaux($this);
        }

        return $this;
    }

    public function removeNoteUc(NoteUc $noteUc): self
    {
        if ($this->noteUcs->contains($noteUc)) {
            $this->noteUcs->removeElement($noteUc);
            // set the owning side to null (unless already changed)
            if ($noteUc->getNiveaux() === $this) {
                $noteUc->setNiveaux(null);
            }
        }

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

    public function getSalle(): ?Salle
    {
        return $this->salle;
    }

    public function setSalle(?Salle $salle): self
    {
        $this->salle = $salle;

        // set (or unset) the owning side of the relation if necessary
        $newNiveau = $salle === null ? null : $this;
        if ($newNiveau !== $salle->getNiveau()) {
            $salle->setNiveau($newNiveau);
        }

        return $this;
    }

    /**
     * @return Collection|Salle[]
     */
    public function getSalles(): Collection
    {
        return $this->salles;
    }

    public function addSalle(Salle $salle): self
    {
        if (!$this->salles->contains($salle)) {
            $this->salles[] = $salle;
            $salle->setNiveau($this);
        }

        return $this;
    }

    public function removeSalle(Salle $salle): self
    {
        if ($this->salles->contains($salle)) {
            $this->salles->removeElement($salle);
            // set the owning side to null (unless already changed)
            if ($salle->getNiveau() === $this) {
                $salle->setNiveau(null);
            }
        }

        return $this;
    }

    public function getScolarite(): ?Scolarite
    {
        return $this->scolarite;
    }

    public function setScolarite(?Scolarite $scolarite): self
    {
        $this->scolarite = $scolarite;

        // set (or unset) the owning side of the relation if necessary
        $newNiveau = $scolarite === null ? null : $this;
        if ($newNiveau !== $scolarite->getNiveau()) {
            $scolarite->setNiveau($newNiveau);
        }

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
            $information->addNiveau($this);
        }

        return $this;
    }

    public function removeInformation(Information $information): self
    {
        if ($this->informations->contains($information)) {
            $this->informations->removeElement($information);
            $information->removeNiveau($this);
        }

        return $this;
    }
}
