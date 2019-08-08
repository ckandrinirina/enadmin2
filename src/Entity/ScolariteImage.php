<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScolariteImageRepository")
 * @ORM\Table(name="scolarite_image")
 */
class ScolariteImage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Scolarite", inversedBy="scolariteImages")
     */
    private $scolarites;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    public function getScolarites(): ?Scolarite
    {
        return $this->scolarites;
    }

    public function setScolarites(?Scolarite $scolarites): self
    {
        $this->scolarites = $scolarites;

        return $this;
    }
}
