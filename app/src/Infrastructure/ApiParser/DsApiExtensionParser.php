<?php

namespace App\Infrastructure\ApiParser;

use App\Domain\Adresse;
use App\Domain\Demandeur;
use App\Domain\Projet;
use App\Domain\Taxation;

class DsApiExtensionParser extends DsApiParser
{
    public function parseResponse($responseBody): Projet
    {
        $data = json_decode($responseBody, true);
        $champs = $data['dossier']['champs'];

        $adresseDemandeur = new Adresse();
        $demandeur = new Demandeur();
        $taxation = new Taxation();
        $projet = new Projet();
        $projet->setEstTravauxSurExistantExtension(true);
        $demandeur->setPrenom($data['dossier']['individual']['prenom']);
        $demandeur->setNom($data['dossier']['individual']['nom']);
        $demandeur->setCivilite($data['dossier']['individual']['civilite']);
        foreach ($champs as $champ) {
            //       Identité et coordonnées du déclarant
            if ('Date de naissance' === $champ['type_de_champ']['libelle']) {
                $demandeur->setDateNaissance($champ['value']);
                continue;
            }
            if ('Adresse ' === $champ['type_de_champ']['libelle']) {
                $adresseDemandeur->setVoie($champ['value']);
                continue;
            }
            if ('Commune' === $champ['type_de_champ']['libelle']) {
                $adresseDemandeur->setLocalite($champ['value']);
                continue;
            }
            if ('Département' === $champ['type_de_champ']['libelle']) {
                $adresseDemandeur->setDepartement($champ['value']);
                continue;
            }
            if ('Pays' === $champ['type_de_champ']['libelle']) {
                $adresseDemandeur->setPays($champ['value']);
                continue;
            }

            //      Localisation du projet
            // duplicata de l'adresse?
            if ('Adresse' === $champ['type_de_champ']['libelle']) {
                continue;
            }
            if ('Ce terrain est-il situé dans un lotissement ?' === $champ['type_de_champ']['libelle']) {
                continue;
            }

            //      Référence cadastrale de votre projet
//            if ('Détermination des parcelles cadastrales' === $champ['type_de_champ']['libelle']) {
//                continue;
//            }
//            if ('préfixe' === $champ['type_de_champ']['libelle']) {
//                continue;
//            }
//            if ('section' === $champ['type_de_champ']['libelle']) {
//                continue;
//            }
//            if ('numéro' === $champ['type_de_champ']['libelle']) {
//                continue;
//            }
            if ('superficie de la parcelle cadastrale (en m²)' === $champ['type_de_champ']['libelle']) {
                continue;
            }

            //      Nature de votre projet
            if ('Votre projet concerne...' === $champ['type_de_champ']['libelle']) {
                if ('votre résidence principale' == trim($champ['value'])) {
                    $projet->setEstPourResidencePrincipale(true);
                }
                if ('votre résidence secondaire' == $champ['value']) {
                    $projet->setEstPourResidenceSecondaire(true);
                }
                continue;
            }
            if ('Type de travaux sur une construction existante' === $champ['type_de_champ']['libelle']) {
                if ('Extension' == $champ['value']) {
                    $projet->setEstTravauxSurExistantExtension(true);
                }

                continue;
            }
            if ('Description de votre projet ou des travaux envisagés' === $champ['type_de_champ']['libelle']) {
                $projet->setCourteDescription($champ['value']);
                continue;
            }

            //      Surfaces de plancher
            if ('la surface de plancher existante' === $champ['type_de_champ']['libelle']) {
                $projet->setSurfacePlancherExistante($champ['value']);
                continue;
            }
            if ('la surface de plancher créée' === $champ['type_de_champ']['libelle']) {
                $projet->setSurfacePlancherCreee($champ['value']);
                continue;
            }
            if ('la surface de plancher supprimée' === $champ['type_de_champ']['libelle']) {
                $projet->setSurfacePlancherSupprimee($champ['value']);
                continue;
            }
            if ('Informations complémentaires' === $champ['type_de_champ']['libelle']) {
                continue;
            }

            //     Déclaration des éléments nécessaires au calcul des impositions
            if ('Surface taxable totale créée de la ou des construction(s), hormis les surfaces de stationnement closes et couvertes (m²)' === $champ['type_de_champ']['libelle']) {
                $taxation->setSurfaceTaxableTotaleCreeeHorsStationnement($champ['value']);
                continue;
            }
            if ('Surface taxable créée des locaux clos et couverts (m²) à usage de stationnement' === $champ['type_de_champ']['libelle']) {
                $taxation->setSurfaceTaxableCreeeLocauxClos($champ['value']);
                continue;
            }
            if ('Pour la réalisation des ces travaux, bénéficiez-vous d’un prêt aidé ' === $champ['type_de_champ']['libelle']) {
                $taxation->setAPretAide('Oui' == $champ['value']);
                continue;
            }
            if ('Si oui, lequel ?' === $champ['type_de_champ']['libelle']) {
                $taxation->setNomPretAide($champ['value']);
                continue;
            }
            if ('Quelle est la surface taxable existante conservée (m²) ?' === $champ['type_de_champ']['libelle']) {
                $taxation->setSurfaceTaxableExistanteConservee($champ['value']);
                continue;
            }
            if ('Quel est le nombre de logements existants ?' === $champ['type_de_champ']['libelle']) {
                $taxation->setNombreLogementsExistants($champ['value']);
                continue;
            }
            if ('Quelle est la surface taxable créée (m²) ?' === $champ['type_de_champ']['libelle']) {
                $taxation->setSurfaceTaxableCreee($champ['value']);
                continue;
            }
            if ('Veuillez préciser la profondeur du(des) terrasement(s) nécessaire(s) à la réalisation de votre projet' === $champ['type_de_champ']['libelle']) {
                $taxation->setProfondeurTerrassements($champ['value']);
                continue;
            }
        }

        $demandeur->setAdresse($adresseDemandeur);
        $projet->setDemandeur($demandeur);
        $projet->setTaxation($taxation);

        return $projet;
    }
}
