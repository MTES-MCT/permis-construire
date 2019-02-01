<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StaticController extends AbstractController
{
    public function homepage()
    {
        return $this->render('static/homepage.html');
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

    public function comment()
    {
        return $this->render('static/comment-ca-marche.html.twig');
    }
}
