<?php
// src/UserBundle/Controller/UserController.php;

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function loginAction(Request $request)
    {
        // If the visitor is already authentified, he goes to the index page
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('home');
        }

        // The authentication_utils service allows to recover the user's name
        // and the error in case the form had already been submitted but was invalid
        // (fake password for example)
        $authenticationUtils = $this->get('security.authentication_utils');

        $user = $this->getUser();

        return $this->render('UserBundle:Security:login.html.twig', array(
            'last_username' => $authenticationUtils->getLastUsername(),
            'error'         => $authenticationUtils->getLastAuthenticationError(),
        ));

        //TODO: penser à définir la securité sur certaines pages auxquelles on accède après s'être connecté (4 méthodes possibles voir OC)
    }
}
