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
    private $urlAgrandissement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urlModificationExterieur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urlAnnexe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urlCloture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urlDivisionLotissements;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urlMultiTravaux;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dsApiToken;

    public function hasLinks(): bool {
        return $this->getUrlAnnexe() !== null
            or $this->getUrlModificationExterieur() !== null
            or $this->getUrlAgrandissement() !== null
            or $this->getUrlCloture() !== null
            or $this->getUrlDivisionLotissements() !== null
            or $this->getUrlMultiTravaux() !== null
            ;
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

    public function getUrlPlu(): ?string
    {
        return $this->url_plu;
    }

    public function setUrlPlu(?string $url_plu): self
    {
        $this->url_plu = $url_plu;

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

    public function getUrlAgrandissement(): ?string
    {
        return $this->urlAgrandissement;
    }

    public function setUrlAgrandissement(?string $urlAgrandissement): self
    {
        $this->urlAgrandissement = $urlAgrandissement;

        return $this;
    }

    public function getUrlModificationExterieur(): ?string
    {
        return $this->urlModificationExterieur;
    }

    public function setUrlModificationExterieur(?string $urlModificationExterieur): self
    {
        $this->urlModificationExterieur = $urlModificationExterieur;

        return $this;
    }

    public function getUrlAnnexe(): ?string
    {
        return $this->urlAnnexe;
    }

    public function setUrlAnnexe(?string $urlAnnexe): self
    {
        $this->urlAnnexe = $urlAnnexe;

        return $this;
    }

    public function getUrlCloture(): ?string
    {
        return $this->urlCloture;
    }

    public function setUrlCloture(?string $urlCloture): self
    {
        $this->urlCloture = $urlCloture;

        return $this;
    }

    public function getDsApiToken(): ?string
    {
        return $this->dsApiToken;
    }

    public function setDsApiToken(?string $dsApiToken): self
    {
        $this->dsApiToken = $dsApiToken;

        return $this;
    }

    public function getUrlDivisionLotissements(): ?string
    {
        return $this->urlDivisionLotissements;
    }

    public function setUrlDivisionLotissements(?string $urlDivisionLotissements): self
    {
        $this->urlDivisionLotissements = $urlDivisionLotissements;

        return $this;
    }

    public function getUrlMultiTravaux(): ?string
    {
        return $this->urlMultiTravaux;
    }

    public function setUrlMultiTravaux(?string $urlMultiTravaux): self
    {
        $this->urlMultiTravaux = $urlMultiTravaux;

        return $this;
    }
}
