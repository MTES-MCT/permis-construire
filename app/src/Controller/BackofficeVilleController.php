<?php

namespace App\Controller;

use App\Form\ExporterDemandeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Ville;
use Symfony\Component\HttpFoundation\Request;

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

    private function genererCsv($id){
        $response = $this->render('backoffice/ville/demande.csv.twig', ["id" => $id]);
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="demande.csv"');

        return $response;
    }

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    private function creationFormulaireTelechargement(): \Symfony\Component\Form\FormInterface
    {
        $form = $this->createForm(ExporterDemandeType::class, null, [
            'action' => $this->generateUrl('route_backoffice_ville_telechargerDemande')
        ]);
        return $form;
    }
}