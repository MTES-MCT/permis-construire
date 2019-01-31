<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Ville;
use Symfony\Component\HttpFoundation\Request;

class QualificationController extends AbstractController
{
    public function qualification1()
    {
        $villes = $this->getDoctrine()
            ->getRepository(Ville::class)
            ->findBy([], ['nom' => 'ASC']);

        return $this->render('qualify/page1.html.twig',
            ['villes' => $villes]
        );
    }

    public function qualification2(Request $request)
    {
        /* @var Ville $ville */
        $ville = $this->getDoctrine()->getRepository(Ville::class)->find(
            $request->get('ville_id', null)
        );
        if (!$ville) {
            return $this->redirect($this->generateUrl('route_pas_de_demarche'));
        }

        return $this->render('qualify/page2.html.twig',
            ['ville' => $ville]
        );
    }

    public function resultats(Request $request)
    {
        $url = $this->getDSRedirectionUrl($request);
        if (null === $url) {
            return $this->redirect($this->generateUrl('route_pas_de_demarche'));
        }

        return $this->render('qualify/resultats.html.twig',
            [
                'ville_id' => $request->get('ville_id', null),
                'projet' => $request->get('projet', null),
            ]
        );
    }

    public function gotods(Request $request)
    {
        $url = $this->getDSRedirectionUrl($request);

        if (null !== $url) {
            return $this->redirect($url);
        }

        return $this->redirect($this->generateUrl('route_pas_de_demarche'));
    }

    private function getDSRedirectionUrl(Request $request): ?string
    {
        /** @var Ville */
        $ville = $this->getDoctrine()->getRepository(Ville::class)->find(
            $request->get('ville_id', null)
        );

        $url = null;
        if (null !== $ville) {
            $projet = $request->get('projet', null);

            if ('extension' == $projet) {
                $url = $ville->getUrlExtension();
            }
            if ('modification_exterieur' == $projet) {
                $url = $ville->getUrlModificationExterieur();
            }
            if ('annexe' == $projet) {
                $url = $ville->getUrlAnnexe();
            }
            if ('cloture' == $projet) {
                $url = $ville->getUrlCloture();
            }
        }

        return $url;
    }

    public function pasdedemarche(Request $request)
    {
        return $this->render(
            'qualify/pas-de-demarche.html.twig'
        );
    }
}
