<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StaticController extends AbstractController
{
    public function homepage()
    {
        return $this->render('homepage.html');
    }

    public function cgu()
    {
        return $this->render('static/cgu.html.twig');
    }

    public function faq()
    {
        return $this->render('static/faq.html.twig');
    }

    public function contact()
    {
        return $this->render('static/contact.html.twig');
    }
}
