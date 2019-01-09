<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Ville;
use Symfony\Component\HttpFoundation\Request;

class QualificationController extends AbstractController
{
    public function qualification1() {
        $villes = $this->getDoctrine()->getRepository(Ville::class)->findAll();

        return $this->render("qualify/page1.html.twig",
            ['villes' => $villes]
        );
    }

    public function qualification2(Request $request) {
        /* @var Ville $ville */
        $ville = $this->getDoctrine()->getRepository(Ville::class)->find(
            $request->get('ville_id', null)
        );
        if(!$ville) {
            return $this->redirect($this->generateUrl('route_pas_de_demarche'));
        }

        return $this->render("qualify/page2.html.twig",
            ['ville' => $ville]
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
        $url = $this->getDSRedirectionUrl($request);
        if ($url === null) {
            return $this->redirect($this->generateUrl('route_pas_de_demarche'));
        }

        return $this->render("qualify/resultats.html.twig",
            [
                'ville_id' => $request->get('ville_id', null),
                'abf' => $request->get('abf', null),
                'projet' => $request->get('projet', null)
            ]
        );
    }

    public function gotods(Request $request) {
        $url = $this->getDSRedirectionUrl($request);

        if ($url !== null)
            return $this->redirect($url);

        return $this->redirect($this->generateUrl('route_pas_de_demarche'));
    }

    private function getDSRedirectionUrl(Request $request){
        /* @var Ville $ville */
        $ville = $this->getDoctrine()->getRepository(Ville::class)->find(
            $request->get('ville_id', null)
        );

        $abf = $request->get('abf', null);
        $projet = $request->get('projet', null);
        $url = null;
        if($abf == 'oui'){
            if ($projet == 'piscine') $url = $ville->getUrlPiscineAbf();
        }
        else {
            if ($projet == 'piscine') $url = $ville->getUrlPiscineNonAbf();
        }
        if ($projet == 'changement-fenetres') $url = $ville->getUrlFenetres();
        return $url;
    }

    public function pasdedemarche(Request $request) {
        return $this->render(
            "qualify/pas-de-demarche.html.twig"
        );
    }
}