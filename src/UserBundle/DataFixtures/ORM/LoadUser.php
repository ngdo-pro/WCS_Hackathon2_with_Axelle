<?php
/**
 * Created by PhpStorm.
 * User: axcel
 * Date: 09/11/16
 * Time: 22:58
 */
// src/UserBundle/DataFixtures/ORM/LoadUser.php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;

class LoadUser implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $james = array(
            "firstName" => "James",
            "lastName" => "Walas",
            "userName" => "James444",
            "email" => "james@gmail.com",
            "password" => "gateau21",
            "country" => "Angleterre",
            "city" => "Londres",
            "language" => "Anglais",
            "visitPoint" => 0,
            "creationPoint" => 0,
            "roles" => "ROLE_USER",
            "salt" => "jdhdfe98asfjélshfvéosiyagv15"
        );

        $nicole = array(
            "firstName" => "Nicole",
            "lastName" => "Silva",
            "userName" => "Nicky01",
            "email" => "nicole.silva@gmail.com",
            "password" => "gouvita",
            "country" => "France",
            "city" => "Dijon",
            "language" => "Français",
            "visitPoint" => 0,
            "creationPoint" => 0,
            "roles" => "ROLE_USER",
            "salt" => "dslfheoaéihgéawkfjàapwf"
        );

        $john = array(
            "firstName" => "John",
            "lastName" => "Pipi",
            "userName" => "Jojo413",
            "email" => "john@gmail.com",
            "password" => "glou66d",
            "country" => "Allemagne",
            "city" => "Berlin",
            "language" => "Allemand",
            "visitPoint" => 0,
            "creationPoint" => 0,
            "roles" => "ROLE_USER",
            "salt" => "aposirpweuotrpawiufpafadfras"
        );

        $listUsers = array($james, $nicole, $john);

        foreach ($listUsers as $user) {
            $userAdmin = new User();

            $userAdmin->setFirstName($user["firstName"]);
            $userAdmin->setLastName($user["lastName"]);
            $userAdmin->setUserName($user["userName"]);
            $userAdmin->setEmail($user["email"]);
            $userAdmin->setPassword($user["password"]);
            $userAdmin->setCountry($user["country"]);
            $userAdmin->setCity($user["city"]);
            $userAdmin->setLanguage($user["language"]);
            $userAdmin->setVisitPoint($user["visitPoint"]);
            $userAdmin->setCreationPoint($user["creationPoint"]);
            $userAdmin->setRoles($user["roles"]);
            $userAdmin->setSalt($user["salt"]);

            $manager->persist($userAdmin);
        }

        $manager->flush();
    }
}