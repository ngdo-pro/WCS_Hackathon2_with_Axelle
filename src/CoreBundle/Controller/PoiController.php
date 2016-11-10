<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\Poi;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


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

    public function ajaxAction(Poi $poi)
    {
        $data['latitude'] = $poi->getLatitude();
        $data['longitude'] = $poi->getLongitude();
        $data['name'] = $poi->getName();
        $data['type'] = $poi->getType();
        $data['typeDetail'] = $poi->getTypeDetail();
        $data['adress'] = $poi->getAdress();
        $data['postalCode'] = $poi->getPostalCode();
        $data['city'] = $poi->getCity();
        $data['phoneNumber'] = $poi->getPhoneNumber();
        $data['faxNumber'] = $poi->getFaxNumber();
        $data['email'] = $poi->getEmail();
        $data['websiteUrl'] = $poi->getWebsiteUrl();
        $data['facebookUrl'] = $poi->getFacebookUrl();
        $data['grading'] = $poi->getGrading();
        $data['openingHours'] = $poi->getOpeningHours();
        $data['tariff'] = $poi->getTariff();
        return new JsonResponse($data);
    }
}