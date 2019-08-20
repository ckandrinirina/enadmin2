<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use PhpParser\Node\Expr\Cast\String_;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ECRepository")
 * @ORM\Table(name="ec")
 */
class EC
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
     * @ORM\ManyToOne(targetEntity="App\Entity\UC", inversedBy="eCs",cascade={"persist"}))
     */
    private $UC;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Note", mappedBy="EC")
     */
    private $notes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FicheIndividuel", mappedBy="EC")
     */
    private $ficheIndividuels;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RepartitionEC", mappedBy="ec", cascade={"persist"})
     */
    private $repartitionECs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EmploiDuTemps", mappedBy="ec")
     */
    private $emploiDuTemps;

    /**
     * @ORM\Column(type="float")
     */
    private $coefficient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @ORM\Column(type="integer")
     */
    private $credit;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Enseignant", inversedBy="eCs")
     */
    private $enseignant;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    public function __construct()
    {
        $this->notes = new ArrayCollection();
        $this->ficheIndividuels = new ArrayCollection();
        $this->repartitionECs = new ArrayCollection();
        $this->emploiDuTemps = new ArrayCollection();
    }

    public function getEnseignant(): ?Enseignant
    {
        return $this->enseignant;
    }

    public function setEnseignant(?Enseignant $enseignant): self
    {
        $this->enseignant = $enseignant;

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

    public function getCoefficient(): ?float
    {
        return $this->coefficient;
    }

    public function setCoefficient(float $coefficient): self
    {
        $this->coefficient = $coefficient;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

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

    public function getUC(): ?UC
    {
        return $this->UC;
    }

    public function setUC(?UC $UC): self
    {
        $this->UC = $UC;

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
            $note->setEC($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->contains($note)) {
            $this->notes->removeElement($note);
            // set the owning side to null (unless already changed)
            if ($note->getEC() === $this) {
                $note->setEC(null);
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
            $ficheIndividuel->setEC($this);
        }

        return $this;
    }

    public function removeFicheIndividuel(FicheIndividuel $ficheIndividuel): self
    {
        if ($this->ficheIndividuels->contains($ficheIndividuel)) {
            $this->ficheIndividuels->removeElement($ficheIndividuel);
            // set the owning side to null (unless already changed)
            if ($ficheIndividuel->getEC() === $this) {
                $ficheIndividuel->setEC(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RepartitionEC[]
     */
    public function getRepartitionECs(): Collection
    {
        return $this->repartitionECs;
    }

    public function addRepartitionEC(RepartitionEC $repartitionEC): self
    {
        if (!$this->repartitionECs->contains($repartitionEC)) {
            $this->repartitionECs[] = $repartitionEC;
            $repartitionEC->setEc($this);
        }

        return $this;
    }

    public function removeRepartitionEC(RepartitionEC $repartitionEC): self
    {
        if ($this->repartitionECs->contains($repartitionEC)) {
            $this->repartitionECs->removeElement($repartitionEC);
            // set the owning side to null (unless already changed)
            if ($repartitionEC->getEc() === $this) {
                $repartitionEC->setEc(null);
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
            $emploiDuTemp->setEc($this);
        }

        return $this;
    }

    public function removeEmploiDuTemp(EmploiDuTemps $emploiDuTemp): self
    {
        if ($this->emploiDuTemps->contains($emploiDuTemp)) {
            $this->emploiDuTemps->removeElement($emploiDuTemp);
            // set the owning side to null (unless already changed)
            if ($emploiDuTemp->getEc() === $this) {
                $emploiDuTemp->setEc(null);
            }
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

}
 