<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 10/11/16
 * Time: 05:52
 */

namespace CoreBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;


class User extends BaseUser
{
    protected $id;

    /**
     * @var string
     */
    protected $name;



    public function __construct()
    {
        parent::__construct();
    }



    /**
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}
