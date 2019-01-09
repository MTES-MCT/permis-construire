<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VilleRepository")
 */
class Ville
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url_piscine_abf;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url_piscine_non_abf;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url_fenetres;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url_plu;

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

    public function getUrlPiscineAbf(): ?string
    {
        return $this->url_piscine_abf;
    }

    public function setUrlPiscineAbf(string $url_piscine_abf): self
    {
        $this->url_piscine_abf = $url_piscine_abf;

        return $this;
    }

    public function getUrlPiscineNonAbf(): ?string
    {
        return $this->url_piscine_non_abf;
    }

    public function setUrlPiscineNonAbf(string $url_piscine_non_abf): self
    {
        $this->url_piscine_non_abf = $url_piscine_non_abf;

        return $this;
    }

    public function getUrlPlu(): ?string
    {
        return $this->url_plu;
    }

    public function setUrlPlu(?string $url_plu): self
    {
        $this->url_plu = $url_plu;

        return $this;
    }

    public function getUrlFenetres(): ?string
    {
        return $this->url_fenetres;
    }

    public function setUrlFenetres(?string $url_fenetres): self
    {
        $this->url_fenetres = $url_fenetres;

        return $this;
    }
}
