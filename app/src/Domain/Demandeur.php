<?php

namespace App\Domain;

class Demandeur
{
    private $nom;
    private $prenom;
    private $civilite;

    private $dateNaissance;
    /** @var Adresse $adresse */
    private $adresse;

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @param mixed $civilite
     */
    public function setCivilite($civilite): void
    {
        $this->civilite = $civilite;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * @param mixed $dateNaissance
     */
    public function setDateNaissance($dateNaissance): void
    {
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @return Adresse
     */
    public function getAdresse(): Adresse
    {
        return $this->adresse;
    }

    /**
     * @param Adresse $adresse
     */
    public function setAdresse(Adresse $adresse): void
    {
        $this->adresse = $adresse;
    }
}
