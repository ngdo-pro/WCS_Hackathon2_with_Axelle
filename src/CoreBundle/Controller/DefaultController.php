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
                $poi->setType(str_replace(array("\r", "\n"), ' ', $feature->properties->type));
                $poi->setTypeDetail(str_replace(array("\r", "\n"), ' ', $feature->properties->type_detail));
                $poi->setName(str_replace(array("\r", "\n"), ' ', $feature->properties->nom));
                $poi->setAdress(str_replace(array("\r", "\n"), ' ', $feature->properties->adresse));
                $poi->setPostalCode(str_replace(array("\r", "\n"), ' ', $feature->properties->codepostal));
                $poi->setCity(str_replace(array("\r", "\n"), ' ', $feature->properties->commune));
                $poi->setPhoneNumber(str_replace(array("\r", "\n"), ' ', $feature->properties->telephone));
                $poi->setFaxNumber(str_replace(array("\r", "\n"), ' ', $feature->properties->fax));
                $poi->setEmail(str_replace(array("\r", "\n"), ' ', $feature->properties->email));
                $poi->setWebsiteUrl(str_replace(array("\r", "\n"), ' ', $feature->properties->siteweb));
                $poi->setFacebookUrl(str_replace(array("\r", "\n"), ' ', $feature->properties->facebook));
                $poi->setGrading(str_replace(array("\r", "\n"), ' ', $feature->properties->classement));
                $poi->setOpeningHours(str_replace(array("\r", "\n"), ' ', $feature->properties->ouverture));
                $poi->setTariff(str_replace(array("\r", "\n"), ' ', $feature->properties->tarifsenclair));
                $poi->setLastUpdate(str_replace(array("\r", "\n"), ' ', $feature->properties->last_update));
                $poi->setLongitude(str_replace(array("\r", "\n"), ' ', $feature->geometry->coordinates[0]));
                $poi->setLatitude(str_replace(array("\r", "\n"), ' ', $feature->geometry->coordinates[1]));
                $em->persist($poi);
            }

        }

        $em->flush();

        return $this->render('CoreBundle:Default:index.html.twig');
    }

    public function homeAction(){
        return $this->render('core/home.html.twig');
    }
}
