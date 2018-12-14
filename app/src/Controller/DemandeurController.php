<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DemandeurController extends AbstractController
{
    public function dashboard() {
        return $this->render("dashboard.html");
    }
}