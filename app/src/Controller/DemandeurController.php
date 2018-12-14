<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DemandeurController extends AbstractController
{
    public function dashboard() {
        return $this->render("demandeur/dashboard.html.twig");
    }

    public function voirDemande() {
        return $this->render("demandeur/voir-demande.html.twig");
    }

    public function depotAldau() {
        return $this->render("demandeur/depot-aldau.html.twig");
    }
}