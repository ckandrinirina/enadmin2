<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SemestreRepository")
 */
class Semestre
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
    private $semestre;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Niveaux", inversedBy="semestres")
     * @ORM\JoinTable(name="semestre_niveaux")
     */
    private $niveaux;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Note", mappedBy="semestre")
     */
    private $notes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FicheIndividuel", mappedBy="semestre")
     */
    private $ficheIndividuels;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RepartitionEC", mappedBy="semestre", cascade={"persist"})
     */
    private $repartitionEC;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\UC", inversedBy="semestres")
     */
    private $uEs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NoteUc", mappedBy="semestre")
     */
    private $noteUcs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EmploiDuTemps", mappedBy="semestre")
     */
    private $emploiDuTemps;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Salle", mappedBy="semestre")
     */
    private $salles;

    public function __construct()
    {
        $this->niveaux = new ArrayCollection();
        $this->notes = new ArrayCollection();
        $this->ficheIndividuels = new ArrayCollection();
        $this->repartitionEC = new ArrayCollection();
        $this->uEs = new ArrayCollection();
        $this->noteUcs = new ArrayCollection();
        $this->emploiDuTemps = new ArrayCollection();
        $this->salles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSemestre(): ?string
    {
        return $this->semestre;
    }

    public function setSemestre(string $semestre): self
    {
        $this->semestre = $semestre;

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
            $uC->setSemestre($this);
        }

        return $this;
    }

    public function removeUC(UC $uC): self
    {
        if ($this->uCs->contains($uC)) {
            $this->uCs->removeElement($uC);
            // set the owning side to null (unless already changed)
            if ($uC->getSemestre() === $this) {
                $uC->setSemestre(null);
            }
        }

        return $this;
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
            $eC->setSemestre($this);
        }

        return $this;
    }

    public function removeEC(EC $eC): self
    {
        if ($this->eCs->contains($eC)) {
            $this->eCs->removeElement($eC);
            // set the owning side to null (unless already changed)
            if ($eC->getSemestre() === $this) {
                $eC->setSemestre(null);
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
            $note->setSemestre($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->contains($note)) {
            $this->notes->removeElement($note);
            // set the owning side to null (unless already changed)
            if ($note->getSemestre() === $this) {
                $note->setSemestre(null);
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
            $ficheIndividuel->setSemestre($this);
        }

        return $this;
    }

    public function removeFicheIndividuel(FicheIndividuel $ficheIndividuel): self
    {
        if ($this->ficheIndividuels->contains($ficheIndividuel)) {
            $this->ficheIndividuels->removeElement($ficheIndividuel);
            // set the owning side to null (unless already changed)
            if ($ficheIndividuel->getSemestre() === $this) {
                $ficheIndividuel->setSemestre(null);
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
        if ($this !== $repartitionEC->getSemestre()) {
            $repartitionEC->setSemestre($this);
        }

        return $this;
    }

    public function addRepartitionEC(RepartitionEC $repartitionEC): self
    {
        if (!$this->repartitionEC->contains($repartitionEC)) {
            $this->repartitionEC[] = $repartitionEC;
            $repartitionEC->setSemestre($this);
        }

        return $this;
    }

    public function removeRepartitionEC(RepartitionEC $repartitionEC): self
    {
        if ($this->repartitionEC->contains($repartitionEC)) {
            $this->repartitionEC->removeElement($repartitionEC);
            // set the owning side to null (unless already changed)
            if ($repartitionEC->getSemestre() === $this) {
                $repartitionEC->setSemestre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UC[]
     */
    public function getUEs(): Collection
    {
        return $this->uEs;
    }

    public function addUE(UC $uE): self
    {
        if (!$this->uEs->contains($uE)) {
            $this->uEs[] = $uE;
        }

        return $this;
    }

    public function removeUE(UC $uE): self
    {
        if ($this->uEs->contains($uE)) {
            $this->uEs->removeElement($uE);
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
            $noteUc->setSemestre($this);
        }

        return $this;
    }

    public function removeNoteUc(NoteUc $noteUc): self
    {
        if ($this->noteUcs->contains($noteUc)) {
            $this->noteUcs->removeElement($noteUc);
            // set the owning side to null (unless already changed)
            if ($noteUc->getSemestre() === $this) {
                $noteUc->setSemestre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EmploiDuTemps[]
     */
    public function getEmploiDuTemps(): Collection
    {
        return $this->emploiDuTemps;
    }

    public function addEmploiDuTemp(EmploiDuTemps $emploiDuTemp): self
    {
        if (!$this->emploiDuTemps->contains($emploiDuTemp)) {
            $this->emploiDuTemps[] = $emploiDuTemp;
            $emploiDuTemp->setSemstre($this);
        }

        return $this;
    }

    public function removeEmploiDuTemp(EmploiDuTemps $emploiDuTemp): self
    {
        if ($this->emploiDuTemps->contains($emploiDuTemp)) {
            $this->emploiDuTemps->removeElement($emploiDuTemp);
            // set the owning side to null (unless already changed)
            if ($emploiDuTemp->getSemstre() === $this) {
                $emploiDuTemp->setSemstre(null);
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
        $newSemestre = $salle === null ? null : $this;
        if ($newSemestre !== $salle->getSemestre()) {
            $salle->setSemestre($newSemestre);
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
            $salle->setSemestre($this);
        }

        return $this;
    }

    public function removeSalle(Salle $salle): self
    {
        if ($this->salles->contains($salle)) {
            $this->salles->removeElement($salle);
            // set the owning side to null (unless already changed)
            if ($salle->getSemestre() === $this) {
                $salle->setSemestre(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->semestre;
    }
}
