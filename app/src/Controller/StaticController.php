<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StaticController extends AbstractController
{
    public function homepage() {
        return $this->render("homepage.html");
    }

    public function qualification1() {
        return $this->render("qualify/page1.html.twig");
    }

    public function qualification2() {
        return $this->render("qualify/page2.html.twig");
    }

    public function qualification3() {
        return $this->render("qualify/page3.html.twig");
    }

    public function resultats() {
        return $this->render("qualify/resultats.html.twig");
    }
}