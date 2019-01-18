<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Ville;
use Symfony\Component\HttpFoundation\Request;

class BackofficeVilleController extends AbstractController
{
    public function dashboard() {
        return $this->render("backoffice/ville/dashboard.html.twig"
        );
    }
}