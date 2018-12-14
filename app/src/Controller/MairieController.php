<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MairieController extends AbstractController
{
    public function dashboard() {
        return $this->render("dashboard.html");
    }
}