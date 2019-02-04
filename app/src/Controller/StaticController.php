<?php

namespace App\Controller;

use App\Domain\Travaux;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

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

    public function infosTravaux(Request $request, $typeTravaux)
    {
        if(Travaux::isValidType($typeTravaux))
            return $this->render('static/infos-travaux.html.twig', ['typeTravaux' => $typeTravaux]);
        throw $this->createNotFoundException("Le type de travaux est inconnu");
    }

    public function comment()
    {
        return $this->render('static/comment-ca-marche.html.twig');
    }
}
