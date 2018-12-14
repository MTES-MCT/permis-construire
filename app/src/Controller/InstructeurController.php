<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InstructeurController extends AbstractController
{
    public function dashboard() {
        return $this->render("instructeur/dashboard.html.twig");
    }

    public function voirDemande() {
        return $this->render("instructeur/voir-demande.html.twig");
    }
}