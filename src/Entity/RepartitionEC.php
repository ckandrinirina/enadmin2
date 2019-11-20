<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RepartitionECRepository")
 * @ORM\Table(name="repartition_ec")
 */
class RepartitionEC
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EC", inversedBy="repartitionECs", cascade={"persist"})
     */
    private $ec;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Niveaux", inversedBy="repartitionEC", cascade={"persist"})
     */
    private $niveaux;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Semestre", inversedBy="repartitionEC", cascade={"persist"})
     */
    private $semestre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEc(): ?EC
    {
        return $this->ec;
    }

    public function setEc(EC $ec): self
    {
        $this->ec = $ec;

        return $this;
    }

    public function getNiveaux(): ?Niveaux
    {
        return $this->niveaux;
    }

    public function setNiveaux(Niveaux $niveaux): self
    {
        $this->niveaux = $niveaux;

        return $this;
    }

    public function getSemestre(): ?Semestre
    {
        return $this->semestre;
    }

    public function setSemestre(Semestre $semestre): self
    {
        $this->semestre = $semestre;

        return $this;
    }
}
