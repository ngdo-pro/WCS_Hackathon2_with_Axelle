<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\Poi;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $json = file_get_contents('openData.json');
        $object = json_decode($json);

        foreach ($object->features as $feature){
            if ($feature->properties->type !== "COMMERCE_ET_SERVICE" && $feature->properties->type !== "HEBERGEMENT_LOCATIF" && $feature->properties->type !== "HEBERGEMENT_COLLECTIF"){
                $poi = new Poi();
                $poi->setType($feature->properties->type);
                $poi->setTypeDetail($feature->properties->type_detail);
                $poi->setName($feature->properties->nom);
                $poi->setAdress($feature->properties->adresse);
                $poi->setPostalCode($feature->properties->codepostal);
                $poi->setCity($feature->properties->commune);
                $poi->setPhoneNumber($feature->properties->telephone);
                $poi->setFaxNumber($feature->properties->fax);
                $poi->setEmail($feature->properties->email);
                $poi->setWebsiteUrl($feature->properties->siteweb);
                $poi->setFacebookUrl($feature->properties->facebook);
                $poi->setGrading($feature->properties->classement);
                $poi->setOpeningHours($feature->properties->ouverture);
                $poi->setTariff($feature->properties->tarifsenclair);
                $poi->setLastUpdate($feature->properties->last_update);
                $poi->setLongitude($feature->geometry->coordinates[0]);
                $poi->setLatitude($feature->geometry->coordinates[1]);
                $em->persist($poi);
            }

        }

        $em->flush();

        return $this->render('CoreBundle:Default:index.html.twig');
    }

    public function homeAction()
    {
        return $this->render('CoreBundle:Default:index.html.twig');
    }
}
