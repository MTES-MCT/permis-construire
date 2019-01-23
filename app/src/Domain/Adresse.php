<?php

namespace App\Domain;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\ApiParser\AdresseRepository")
 * @ORM\Table(name="adresse")
 */
class Adresse
{
    private $numero;

    private $voie;

    private $lieudit;

    private $localite;

    private $codePostal;

    private $departement;

    private $pays;

    private $boitePostale;

    private $cedex;

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

    /**
     * @return mixed
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * @param mixed $departement
     */
    public function setDepartement($departement): void
    {
        $this->departement = $departement;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays): void
    {
        $this->pays = $pays;
    }
}
