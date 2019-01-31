<?php

namespace App\Infrastructure\ApiParser;

use App\Domain\Demandeur;
use App\Domain\Projet;

class GenericDsApiParser extends DsApiParser
{
    public function parseResponse($responseBody): Projet
    {
        $data = json_decode($responseBody, true);
        $demandeur = new Demandeur();

        $champs = $data['dossier']['champs'];

        foreach ($champs as $champ) {
            if ('Civilité' === $champ['type_de_champ']['libelle']) {
                $demandeur->setCivilite($champ['value']);
            }
            if ('Nom' === $champ['type_de_champ']['libelle']) {
                $demandeur->setNom($champ['value']);
            }
            if ('Prénom' === $champ['type_de_champ']['libelle']) {
                $demandeur->setPrenom($champ['value']);
            }
        }

        $projet = new Projet();
        $projet->setDemandeur($demandeur);

        return $projet;
    }
}
