<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UCRepository")
 * @ORM\Table(name="ue")
 */
class UC
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
     * @ORM\OneToMany(targetEntity="App\Entity\EC", mappedBy="UC")
     */
    private $eCs;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Semestre", mappedBy="uEs")
     */
    private $semestres;

    /**
     * @ORM\Column(type="float")
     */
    private $coefficient;

    /**
     * @ORM\Column(type="integer")
     */
    private $credit;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Niveaux", mappedBy="uCs")
     */
    private $niveaux;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NoteUc", mappedBy="uc")
     */
    private $noteUcs;

    public function __construct()
    {
        $this->eCs = new ArrayCollection();
        $this->semestres = new ArrayCollection();
        $this->niveaux = new ArrayCollection();
        $this->noteUcs = new ArrayCollection();
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
            $eC->setUC($this);
        }

        return $this;
    }

    public function removeEC(EC $eC): self
    {
        if ($this->eCs->contains($eC)) {
            $this->eCs->removeElement($eC);
            // set the owning side to null (unless already changed)
            if ($eC->getUC() === $this) {
                $eC->setUC(null);
            }
        }

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
            $semestre->addUE($this);
        }

        return $this;
    }

    public function removeSemestre(Semestre $semestre): self
    {
        if ($this->semestres->contains($semestre)) {
            $this->semestres->removeElement($semestre);
            $semestre->removeUE($this);
        }

        return $this;
    }

    public function getCoefficient(): ?float
    {
        return $this->coefficient;
    }

    public function setCoefficient(float $coefficient): self
    {
        $this->coefficient = $coefficient;

        return $this;
    }

    public function getCredit(): ?int
    {
        return $this->credit;
    }

    public function setCredit(int $credit): self
    {
        $this->credit = $credit;

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
            $niveau->addUC($this);
        }

        return $this;
    }

    public function removeNiveau(Niveaux $niveau): self
    {
        if ($this->niveaux->contains($niveau)) {
            $this->niveaux->removeElement($niveau);
            $niveau->removeUC($this);
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
            $noteUc->setUc($this);
        }

        return $this;
    }

    public function removeNoteUc(NoteUc $noteUc): self
    {
        if ($this->noteUcs->contains($noteUc)) {
            $this->noteUcs->removeElement($noteUc);
            // set the owning side to null (unless already changed)
            if ($noteUc->getUc() === $this) {
                $noteUc->setUc(null);
            }
        }

        return $this;
    }
}
