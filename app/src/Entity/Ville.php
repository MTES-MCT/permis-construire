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
    private $url_plu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url_geoportail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url_terrassement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url_surrelevation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url_ravalement;

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
    private $url_cloture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url_fenetres;

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

    public function getUrlTerrassement(): ?string
    {
        return $this->url_terrassement;
    }

    public function setUrlTerrassement(?string $url_terrassement): self
    {
        $this->url_terrassement = $url_terrassement;

        return $this;
    }

    public function getUrlSurrelevation(): ?string
    {
        return $this->url_surrelevation;
    }

    public function setUrlSurrelevation(?string $url_surrelevation): self
    {
        $this->url_surrelevation = $url_surrelevation;

        return $this;
    }

    public function getUrlRavalement(): ?string
    {
        return $this->url_ravalement;
    }

    public function setUrlRavalement(?string $url_ravalement): self
    {
        $this->url_ravalement = $url_ravalement;

        return $this;
    }

    public function getUrlCloture(): ?string
    {
        return $this->url_cloture;
    }

    public function setUrlCloture(?string $url_cloture): self
    {
        $this->url_cloture = $url_cloture;

        return $this;
    }

    public function getUrlGeoportail(): ?string
    {
        return $this->url_geoportail;
    }

    public function setUrlGeoportail(?string $url_geoportail): self
    {
        $this->url_geoportail = $url_geoportail;

        return $this;
    }
}
