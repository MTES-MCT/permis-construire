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

    public function qualification1() {
        $villes = $this->getDoctrine()->getRepository(Ville::class)->findAll();

        return $this->render("qualify/page1.html.twig",
            ['villes' => $villes]
        );
    }

    public function qualification2(Request $request) {
        return $this->render("qualify/page2.html.twig",
            ['ville_id' => $request->get('ville_id', null)]
        );
    }

    public function qualification3(Request $request) {
        return $this->render(
            "qualify/page3.html.twig",
            [
                'ville_id' => $request->get('ville_id', null),
                'abf' => $request->get('abf', null),
            ]
        );
    }

    public function resultats(Request $request) {
        return $this->render("qualify/resultats.html.twig",
            [
                'ville_id' => $request->get('ville_id', null),
                'abf' => $request->get('abf', null),
                'projet' => $request->get('projet', null)
            ]
        );
    }
}