<?php

namespace App\Controller;

use App\Domain\Demandeur;
use App\Domain\Projet;
use App\Form\ExporterDemandeType;
use GuzzleHttp\Client;
use Nette\Neon\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BackofficeVilleController extends AbstractController
{
    public function tableauDeBord()
    {
        $form = $this->creationFormulaireTelechargement();

        return $this->render('backoffice/ville/tableau-de-bord.html.twig',
            ['form' => $form->createView()]
        );
    }

    public function telechargerDemande(Request $request)
    {
        $form = $this->creationFormulaireTelechargement();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $projet = $this->requeteApiDS($formData['demande_id']);

            return $this->genererCsv($projet, $formData['demande_id']);
        }
    }

    private function genererCsv($projet, $demandeId): Response
    {
        $response = $this->render('backoffice/ville/demande.csv.twig', ['projet' => $projet]);
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', sprintf('attachment; filename="demande-%s.csv"', $demandeId));

        return $response;
    }

    private function requeteApiDS($demandeId)
    {
        $user = $this->getUser();
        $ville = $user->getVille();
        $url = "https://www.demarches-simplifiees.fr/api/v1/procedures/12627/dossiers/$demandeId?token=".$ville->getDsApiToken();

        $client = new Client();
        try {
            $response = $client->request('GET', $url);
        } catch (Exception $e) {
        }

        return $this->parseResponse($response->getBody()->getContents());
    }

    private function parseResponse($jsonContents): Projet
    {
        $data = json_decode($jsonContents, true);
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

    /**
     * @return FormInterface
     */
    private function creationFormulaireTelechargement(): FormInterface
    {
        $form = $this->createForm(ExporterDemandeType::class, null, [
            'action' => $this->generateUrl('route_backoffice_ville_telechargerDemande'),
        ]);

        return $form;
    }
}
