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
        $roleMapping = [
            'ROLE_INSTRUCTEUR' => 'route_instructeur_dashboard',
            'ROLE_MAIRIE' => 'route_mairie_dashboard',
            'ROLE_ADMIN' => 'easyadmin',
        ];

        $redirectionUrl = $this->router->generate('route_demandeur_dashboard');
        foreach($token_name->getRoles() as $role) {
            if(array_key_exists($role->getRole(), $roleMapping)) {
                $redirectionUrl = $this->router->generate($roleMapping[$role->getRole()]);
                break;
            }
        }
        return new RedirectResponse($redirectionUrl);
    }
}