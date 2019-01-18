<?php

namespace App\Domain;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DossierRepository")
 * @ORM\Table(name="dossier")
 */
class Dossier
{
    const STATUS_BROUILLON = 'brouillon';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * Un dossier est associé à un projet.
     *
     * @ORM\OneToOne(targetEntity="Projet")
     * @ORM\JoinColumn(name="projet_id", referencedColumnName="id")
     */
    private $projet;

    public function __construct()
    {
        $this->setStatut(self::STATUS_BROUILLON);
        $this->setProjet(new Projet());
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getProjet(): Projet
    {
        return $this->projet;
    }

    public function setProjet(Projet $projet)
    {
        $this->projet = $projet;

        return $this;
    }
}
