<?php

namespace App\Controller;

use App\Form\ExporterDemandeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Ville;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BackofficeVilleController extends AbstractController
{
    public function tableauDeBord() {
        //$task = ...;
        $form = $this->creationFormulaireTelechargement();
        return $this->render("backoffice/ville/tableau-de-bord.html.twig",
            [ 'form' => $form->createView() ]
        );
    }

    public function telechargerDemande(Request $request) {
        $form = $this->creationFormulaireTelechargement();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();

            return $this->genererCsv($formData['demande_id']);
        }
    }

    private function genererCsv($id): Response {
        $response = $this->render('backoffice/ville/demande.csv.twig', ["id" => $id]);
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="demande.csv"');

        return $response;
    }

    /**
     * @return FormInterface
     */
    private function creationFormulaireTelechargement(): FormInterface
    {
        $form = $this->createForm(ExporterDemandeType::class, null, [
            'action' => $this->generateUrl('route_backoffice_ville_telechargerDemande')
        ]);
        return $form;
    }
}