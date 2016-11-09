<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\Poi;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Poi controller.
 *
 */
class PoiController extends Controller
{
    /**
     * Lists all poi entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pois = $em->getRepository('CoreBundle:Poi')->findAll();

        return $this->render('poi/index.html.twig', array(
            'pois' => $pois,
        ));
    }

    /**
     * Finds and displays a poi entity.
     *
     */
    public function showAction(Poi $poi)
    {

        return $this->render('poi/show.html.twig', array(
            'poi' => $poi,
        ));
    }
}
