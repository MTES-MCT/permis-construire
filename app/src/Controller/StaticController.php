<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Ville;
use Symfony\Component\HttpFoundation\Request;

class StaticController extends AbstractController
{
    public function homepage() {
        return $this->render("homepage.html");
    }
}