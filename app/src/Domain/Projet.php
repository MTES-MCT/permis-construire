<?php

namespace App\Domain;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\ApiParser\ProjetRepository")
 * @ORM\Table(name="projet")
 */
class Projet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /** @var Demandeur */
    private $demandeur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estNouvelleConstruction;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estNouvelleConstructionPiscine;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estNouvelleConstructionGarage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estNouvelleConstructionVeranda;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estNouvelleConstructionAbriJardin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nouvelleConstructionAutres;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estTravauxSurExistant;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estTravauxSurExistantExtension;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estTravauxSurExistantSurrelevation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estTravauxSurExistantCreationNiveaux;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $travauxSurExistantAutres;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estCloture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $courteDescription;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estPourResidencePrincipale;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estPourResidenceSecondaire;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $surfacePlancherExistante;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $surfacePlancherCreee;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $surfacePlancherSupprimee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->setEstNouvelleConstruction(false);
        $this->setEstNouvelleConstructionAbriJardin(false);
        $this->setEstNouvelleConstructionGarage(false);
        $this->setEstNouvelleConstructionPiscine(false);
        $this->setEstNouvelleConstructionVeranda(false);
        $this->setNouvelleConstructionAutres('');

        $this->setEstTravauxSurExistant(false);
        $this->setEstTravauxSurExistantCreationNiveaux(false);
        $this->setEstTravauxSurExistantExtension(false);
        $this->setEstTravauxSurExistantSurrelevation(false);

        $this->setEstCloture(false);

        $this->setCourteDescription('');
        $this->setSurfacePlancherExistante(0);
        $this->setSurfacePlancherCreee(0);
        $this->setSurfacePlancherSupprimee(0);
    }

    public function getEstNouvelleConstruction(): ?bool
    {
        return $this->estNouvelleConstruction;
    }

    public function setEstNouvelleConstruction(bool $estNouvelleConstruction): self
    {
        $this->estNouvelleConstruction = $estNouvelleConstruction;

        return $this;
    }

    public function getCourteDescription(): ?string
    {
        return $this->courteDescription;
    }

    public function setCourteDescription(?string $courteDescription): self
    {
        $this->courteDescription = $courteDescription;

        return $this;
    }

    public function getEstNouvelleConstructionPiscine(): ?bool
    {
        return $this->estNouvelleConstructionPiscine;
    }

    public function setEstNouvelleConstructionPiscine(bool $estNouvelleConstructionPiscine): self
    {
        $this->estNouvelleConstructionPiscine = $estNouvelleConstructionPiscine;

        return $this;
    }

    public function getEstNouvelleConstructionGarage(): ?bool
    {
        return $this->estNouvelleConstructionGarage;
    }

    public function setEstNouvelleConstructionGarage(bool $estNouvelleConstructionGarage): self
    {
        $this->estNouvelleConstructionGarage = $estNouvelleConstructionGarage;

        return $this;
    }

    public function getEstNouvelleConstructionVeranda(): ?bool
    {
        return $this->estNouvelleConstructionVeranda;
    }

    public function setEstNouvelleConstructionVeranda(bool $estNouvelleConstructionVeranda): self
    {
        $this->estNouvelleConstructionVeranda = $estNouvelleConstructionVeranda;

        return $this;
    }

    public function getEstNouvelleConstructionAbriJardin(): ?bool
    {
        return $this->estNouvelleConstructionAbriJardin;
    }

    public function setEstNouvelleConstructionAbriJardin(bool $estNouvelleConstructionAbriJardin): self
    {
        $this->estNouvelleConstructionAbriJardin = $estNouvelleConstructionAbriJardin;

        return $this;
    }

    public function getNouvelleConstructionAutres(): ?string
    {
        return $this->nouvelleConstructionAutres;
    }

    public function setNouvelleConstructionAutres(?string $nouvelleConstructionAutres): self
    {
        $this->nouvelleConstructionAutres = $nouvelleConstructionAutres;

        return $this;
    }

    public function getEstTravauxSurExistant(): ?bool
    {
        return $this->estTravauxSurExistant;
    }

    public function setEstTravauxSurExistant(bool $estTravauxSurExistant): self
    {
        $this->estTravauxSurExistant = $estTravauxSurExistant;

        return $this;
    }

    public function getEstTravauxSurExistantExtension(): ?bool
    {
        return $this->estTravauxSurExistantExtension;
    }

    public function setEstTravauxSurExistantExtension(bool $estTravauxSurExistantExtension): self
    {
        $this->estTravauxSurExistantExtension = $estTravauxSurExistantExtension;

        return $this;
    }

    public function getEstTravauxSurExistantSurrelevation(): ?bool
    {
        return $this->estTravauxSurExistantSurrelevation;
    }

    public function setEstTravauxSurExistantSurrelevation(bool $estTravauxSurExistantSurrelevation): self
    {
        $this->estTravauxSurExistantSurrelevation = $estTravauxSurExistantSurrelevation;

        return $this;
    }

    public function getEstTravauxSurExistantCreationNiveaux(): ?bool
    {
        return $this->estTravauxSurExistantCreationNiveaux;
    }

    public function setEstTravauxSurExistantCreationNiveaux(bool $estTravauxSurExistantCreationNiveaux): self
    {
        $this->estTravauxSurExistantCreationNiveaux = $estTravauxSurExistantCreationNiveaux;

        return $this;
    }

    public function getTravauxSurExistantAutres(): ?string
    {
        return $this->travauxSurExistantAutres;
    }

    public function setTravauxSurExistantAutres(?string $travauxSurExistantAutres): self
    {
        $this->travauxSurExistantAutres = $travauxSurExistantAutres;

        return $this;
    }

    public function getEstCloture(): ?bool
    {
        return $this->estCloture;
    }

    public function setEstCloture(bool $estCloture): self
    {
        $this->estCloture = $estCloture;

        return $this;
    }

    public function getEstPourResidencePrincipale(): ?bool
    {
        return $this->estPourResidencePrincipale;
    }

    public function setEstPourResidencePrincipale(bool $estPourResidencePrincipale): self
    {
        $this->estPourResidencePrincipale = $estPourResidencePrincipale;

        return $this;
    }

    public function getEstPourResidenceSecondaire(): ?bool
    {
        return $this->estPourResidenceSecondaire;
    }

    public function setEstPourResidenceSecondaire(bool $estPourResidenceSecondaire): self
    {
        $this->estPourResidenceSecondaire = $estPourResidenceSecondaire;

        return $this;
    }

    public function getSurfacePlancherExistante(): ?float
    {
        return $this->surfacePlancherExistante;
    }

    public function setSurfacePlancherExistante(?float $surfacePlancherExistante): self
    {
        $this->surfacePlancherExistante = $surfacePlancherExistante;

        return $this;
    }

    public function getSurfacePlancherCreee(): ?float
    {
        return $this->surfacePlancherCreee;
    }

    public function setSurfacePlancherCreee(?float $surfacePlancherCreee): self
    {
        $this->surfacePlancherCreee = $surfacePlancherCreee;

        return $this;
    }

    public function getSurfacePlancherSupprimee(): ?float
    {
        return $this->surfacePlancherSupprimee;
    }

    public function setSurfacePlancherSupprimee(?float $surfacePlancherSupprimee): self
    {
        $this->surfacePlancherSupprimee = $surfacePlancherSupprimee;

        return $this;
    }

    /**
     * @return Demandeur
     */
    public function getDemandeur(): Demandeur
    {
        return $this->demandeur;
    }

    /**
     * @param Demandeur $demandeur
     *
     * @return Projet
     */
    public function setDemandeur(Demandeur $demandeur): Projet
    {
        $this->demandeur = $demandeur;

        return $this;
    }
}
