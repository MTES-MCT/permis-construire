<?php

use App\Infrastructure\ApiParser\DsApiExtensionParser;
use PHPUnit\Framework\TestCase;

class DsApiExtensionParserTest extends TestCase
{
    public function testParser(){
        $content = file_get_contents(__DIR__.'/ds-extension-api-return.json');
        $parser = new DsApiExtensionParser();
        $projet = $parser->parseResponse($content);

        $this->assertTrue($projet->getEstTravauxSurExistantExtension());

        //      Identité et coordonnées du déclarant
        // Civilité
        $this->assertEquals("M.", $projet->getDemandeur()->getCivilite());
        // Nom
        $this->assertEquals("Michel", $projet->getDemandeur()->getNom());
        // Prénom
        $this->assertEquals("Jean", $projet->getDemandeur()->getPrenom());

        // Date de naissance
        $this->assertEquals("1976-12-24", $projet->getDemandeur()->getDateNaissance());

        // Adresse
        $this->assertEquals("12 Rue Champs Élysées 27220 L'Habit", $projet->getDemandeur()->getAdresse()->getVoie());
        // Commune
        $this->assertEquals("L'habit", $projet->getDemandeur()->getAdresse()->getLocalite());
        // Département
        $this->assertEquals("27 - Eure", $projet->getDemandeur()->getAdresse()->getDepartement());
        // Pays
        $this->assertEquals("FRANCE", $projet->getDemandeur()->getAdresse()->getPays());
/*
        //      Localisation du projet
        // Adresse
//        $this->assertEquals("{"type":"MultiPolygon","coordinates":[[[[1.3572406768798828,48.87120756156153],[1.3576698303222658,48.870868827622395],[1.3574123382568362,48.8699655259064],[1.355695724487305,48.87024780944447],[1.3557815551757815,48.8704736351283],[1.3554382324218752,48.8714333829136],[1.3572406768798828,48.87120756156153]]]]}", $projet->getDemandeur()->getCivilite());
        // Ce terrain est-il situé dans un lotissement ?
        $this->assertEquals("Non", $projet->getDemandeur()->getCivilite());

        //      Référence cadastrale de votre projet
        // Détermination des parcelles cadastrales
//        $this->assertEquals("{"type":"MultiPolygon","coordinates":[[[[1.35706901550293,48.87098173919027],[1.3591289520263674,48.8707841437793],[1.3591718673706055,48.87067123176554],[1.3578414916992188,48.86965501217511],[1.3570261001586916,48.86940095405255],[1.3556098937988283,48.86951386893293],[1.3554382324218752,48.86965501217511],[1.3562965393066408,48.870727687804276],[1.3568544387817383,48.87106642269893],[1.35706901550293,48.87098173919027]]]]}", $projet->getDemandeur()->getCivilite());
        // préfixe
        $this->assertEquals("23", $projet->getDemandeur()->getCivilite());
        // section
        $this->assertEquals("123", $projet->getDemandeur()->getCivilite());
        // numéro
        $this->assertEquals("456", $projet->getDemandeur()->getCivilite());
        // superficie de la parcelle cadastrale (en m²)
        $this->assertEquals("12", $projet->getDemandeur()->getCivilite());
*/
        //      Nature de votre projet
        // Votre projet concerne...
        $this->assertTrue($projet->getEstPourResidencePrincipale());
        $this->assertFalse($projet->getEstPourResidenceSecondaire());
        // Type de travaux sur une construction existante
        $this->assertTrue($projet->getEstTravauxSurExistantExtension());
        // Description de votre projet ou des travaux envisagés
        $this->assertEquals("ajout d'une véranda", $projet->getCourteDescription());

        //      Surfaces de plancher
        // la surface de plancher existante
        $this->assertEquals("12", $projet->getSurfacePlancherExistante());
        // la surface de plancher créée
        $this->assertEquals("1", $projet->getSurfacePlancherCreee());
        // la surface de plancher supprimée
        $this->assertEquals("1", $projet->getSurfacePlancherSupprimee());
        // Informations complémentaires
        // correspond pas à un champ du cerfa
//        $this->assertEquals("pas d'infos complémentaires", $projet->());

        //      Déclaration des éléments nécessaires au calcul des impositions
        // Surface taxable totale créée de la ou des construction(s), hormis les surfaces de stationnement closes et couvertes (m²)
        $this->assertEquals("1", $projet->getTaxation()->getSurfaceTaxableTotaleCreeeHorsStationnement());
        // Surface taxable créée des locaux clos et couverts (m²) à usage de stationnement
        $this->assertEquals("0", $projet->getTaxation()->getSurfaceTaxableCreeeLocauxClos());
        // Pour la réalisation des ces travaux, bénéficiez-vous d’un prêt aidé
        $this->assertFalse($projet->getTaxation()->isAPretAide());
        // Si oui, lequel ?
        $this->assertEquals("pas de pret aidé", $projet->getTaxation()->getNomPretAide());
        // Quelle est la surface taxable existante conservée (m²) ?
        $this->assertEquals("12", $projet->getTaxation()->getSurfaceTaxableExistanteConservee());
        // Quel est le nombre de logements existants ?
        $this->assertEquals("1", $projet->getTaxation()->getNombreLogementsExistants());
        // Quelle est la surface taxable créée (m²) ?
        $this->assertEquals("0", $projet->getTaxation()->getSurfaceTaxableCreee());
        // Veuillez préciser la profondeur du(des) terrasement(s) nécessaire(s) à la réalisation de votre projet
        $this->assertEquals("0", $projet->getTaxation()->getProfondeurTerrassements());

    }
}
