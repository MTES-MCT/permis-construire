<?php

namespace App\Domain;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdresseRepository")
 * @ORM\Table(name="adresse")
 */
class Adresse
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
    private $numero;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $voie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieudit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $localite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $boitePostale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cedex;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getVoie(): ?string
    {
        return $this->voie;
    }

    public function setVoie(?string $voie): self
    {
        $this->voie = $voie;

        return $this;
    }

    public function getLieudit(): ?string
    {
        return $this->lieudit;
    }

    public function setLieudit(string $lieudit): self
    {
        $this->lieudit = $lieudit;

        return $this;
    }

    public function getLocalite(): ?string
    {
        return $this->localite;
    }

    public function setLocalite(string $localite): self
    {
        $this->localite = $localite;

        return $this;
    }

    public function getBoitePostale(): ?string
    {
        return $this->boitePostale;
    }

    public function setBoitePostale(?string $boitePostale): self
    {
        $this->boitePostale = $boitePostale;

        return $this;
    }

    public function getCedex(): ?string
    {
        return $this->cedex;
    }

    public function setCedex(?string $cedex): self
    {
        $this->cedex = $cedex;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(?string $codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }
}
