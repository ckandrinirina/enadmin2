<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParametrageRepository")
 */
class Parametrage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Enseignant", inversedBy="parametrage", cascade={"persist", "remove"})
     */
    private $chefmention;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChefmention(): ?Enseignant
    {
        return $this->chefmention;
    }

    public function setChefmention(?Enseignant $chefmention): self
    {
        $this->chefmention = $chefmention;

        return $this;
    }
}
