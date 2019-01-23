<?php


namespace App\Domain;


class Taxation
{
    /** @var float */
    private $surfaceTaxableTotaleCreeeHorsStationnement;
    /** @var float */
    private $surfaceTaxableCreeeLocauxClos;
    /** @var bool */
    private $aPretAide;
    /** @var string */
    private $nomPretAide;

    /** @var float */
    private $surfaceTaxableExistanteConservee;
    /** @var int */
    private $nombreLogementsExistants;
    /** @var float */
    private $surfaceTaxableCreee;
    /** @var float */
    private $profondeurTerrassements;

    /**
     * @return float
     */
    public function getSurfaceTaxableTotaleCreeeHorsStationnement(): float
    {
        return $this->surfaceTaxableTotaleCreeeHorsStationnement;
    }

    /**
     * @param float $surfaceTaxableTotaleCreeeHorsStationnement
     * @return Taxation
     */
    public function setSurfaceTaxableTotaleCreeeHorsStationnement(float $surfaceTaxableTotaleCreeeHorsStationnement): Taxation
    {
        $this->surfaceTaxableTotaleCreeeHorsStationnement = $surfaceTaxableTotaleCreeeHorsStationnement;
        return $this;
    }

    /**
     * @return float
     */
    public function getSurfaceTaxableCreeeLocauxClos(): float
    {
        return $this->surfaceTaxableCreeeLocauxClos;
    }

    /**
     * @param float $surfaceTaxableCreeeLocauxClos
     * @return Taxation
     */
    public function setSurfaceTaxableCreeeLocauxClos(float $surfaceTaxableCreeeLocauxClos): Taxation
    {
        $this->surfaceTaxableCreeeLocauxClos = $surfaceTaxableCreeeLocauxClos;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAPretAide(): bool
    {
        return $this->aPretAide;
    }

    /**
     * @param bool $aPretAide
     * @return Taxation
     */
    public function setAPretAide(bool $aPretAide): Taxation
    {
        $this->aPretAide = $aPretAide;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomPretAide(): string
    {
        return $this->nomPretAide;
    }

    /**
     * @param string $nomPretAide
     * @return Taxation
     */
    public function setNomPretAide(string $nomPretAide): Taxation
    {
        $this->nomPretAide = $nomPretAide;
        return $this;
    }

    /**
     * @return float
     */
    public function getSurfaceTaxableExistanteConservee(): float
    {
        return $this->surfaceTaxableExistanteConservee;
    }

    /**
     * @param float $surfaceTaxableExistanteConservee
     * @return Taxation
     */
    public function setSurfaceTaxableExistanteConservee(float $surfaceTaxableExistanteConservee): Taxation
    {
        $this->surfaceTaxableExistanteConservee = $surfaceTaxableExistanteConservee;
        return $this;
    }

    /**
     * @return int
     */
    public function getNombreLogementsExistants(): int
    {
        return $this->nombreLogementsExistants;
    }

    /**
     * @param int $nombreLogementsExistants
     * @return Taxation
     */
    public function setNombreLogementsExistants(int $nombreLogementsExistants): Taxation
    {
        $this->nombreLogementsExistants = $nombreLogementsExistants;
        return $this;
    }

    /**
     * @return float
     */
    public function getSurfaceTaxableCreee(): float
    {
        return $this->surfaceTaxableCreee;
    }

    /**
     * @param float $surfaceTaxableCreee
     * @return Taxation
     */
    public function setSurfaceTaxableCreee(float $surfaceTaxableCreee): Taxation
    {
        $this->surfaceTaxableCreee = $surfaceTaxableCreee;
        return $this;
    }

    /**
     * @return float
     */
    public function getProfondeurTerrassements(): float
    {
        return $this->profondeurTerrassements;
    }

    /**
     * @param float $profondeurTerrassements
     * @return Taxation
     */
    public function setProfondeurTerrassements(float $profondeurTerrassements): Taxation
    {
        $this->profondeurTerrassements = $profondeurTerrassements;
        return $this;
    }
}