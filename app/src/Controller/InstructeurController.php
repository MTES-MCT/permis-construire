<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InstructeurController extends AbstractController
{
    public function dashboard() {
        return $this->render("dashboard.html");
    }
}