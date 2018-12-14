<?php

namespace App\Security;

use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    protected $router;
    protected $session;

    public function __construct(Router $router, Session $session)
    {
        $this->router = $router;
        $this->session = $session;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token_name)
    {
        $redirectionUrl = $this->router->generate('route_demandeur_dashboard');
        foreach($token_name->getRoles() as $role) {
            if($role->getRole() == 'ROLE_INSTRUCTEUR') {
                $redirectionUrl = $this->router->generate('route_instructeur_dashboard');
                break;
            }

            if($role->getRole() == 'ROLE_MAIRIE') {
                $redirectionUrl = $this->router->generate('route_mairie_dashboard');
                break;
            }
        }
        return new RedirectResponse($redirectionUrl);
    }
}