<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MairieController extends AbstractController
{
    public function dashboard() {
        return $this->render("mairie/dashboard.html.twig");
    }

    public function voirDemande() {
        return $this->render("mairie/voir-demande.html.twig");
    }
}