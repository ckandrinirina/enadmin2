<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FicheIndividuelRepository")
 */
class FicheIndividuel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Etudiant", inversedBy="ficheIndividuels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etudiant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EC", inversedBy="ficheIndividuels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $EC;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Semestre", inversedBy="ficheIndividuels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $semestre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AnneUniversitaire", inversedBy="ficheIndividuels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $anneUniversitaire;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEC(): ?EC
    {
        return $this->EC;
    }

    public function setEC(?EC $EC): self
    {
        $this->EC = $EC;

        return $this;
    }

    public function getSemestre(): ?Semestre
    {
        return $this->semestre;
    }

    public function setSemestre(?Semestre $semestre): self
    {
        $this->semestre = $semestre;

        return $this;
    }

    public function getNote(): ?Note
    {
        return $this->note;
    }

    public function setNote(?Note $note): self
    {
        $this->note = $note;

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
}
