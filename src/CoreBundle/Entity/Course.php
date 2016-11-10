<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Course
 */
class Course
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $duration;

    /**
     * @var int
     */
    private $likes;

    /**
     * @var bool
     */
    private $sponsored;

    /**
     * @var string
     */
    private $author;

    /**
     * @var int
     */
    private $origin;

    /**
     * @var int
     */
    private $firstStage;

    /**
     * @var int
     */
    private $secondStage;

    /**
     * @var string
     */
    private $thirdStage;

    /**
     * @var int
     */
    private $fourthStage;

    /**
     * @var int
     */
    private $fifthStage;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Course
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

    /**
     * Set duration
     *
     * @param string $duration
     * @return Course
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return string 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set likes
     *
     * @param integer $likes
     * @return Course
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;

        return $this;
    }

    /**
     * Get likes
     *
     * @return integer 
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Set sponsored
     *
     * @param boolean $sponsored
     * @return Course
     */
    public function setSponsored($sponsored)
    {
        $this->sponsored = $sponsored;

        return $this;
    }

    /**
     * Get sponsored
     *
     * @return boolean 
     */
    public function getSponsored()
    {
        return $this->sponsored;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Course
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set origin
     *
     * @param integer $origin
     * @return Course
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * Get origin
     *
     * @return integer 
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * Set firstStage
     *
     * @param integer $firstStage
     * @return Course
     */
    public function setFirstStage($firstStage)
    {
        $this->firstStage = $firstStage;

        return $this;
    }

    /**
     * Get firstStage
     *
     * @return integer 
     */
    public function getFirstStage()
    {
        return $this->firstStage;
    }

    /**
     * Set secondStage
     *
     * @param integer $secondStage
     * @return Course
     */
    public function setSecondStage($secondStage)
    {
        $this->secondStage = $secondStage;

        return $this;
    }

    /**
     * Get secondStage
     *
     * @return integer 
     */
    public function getSecondStage()
    {
        return $this->secondStage;
    }

    /**
     * Set thirdStage
     *
     * @param string $thirdStage
     * @return Course
     */
    public function setThirdStage($thirdStage)
    {
        $this->thirdStage = $thirdStage;

        return $this;
    }

    /**
     * Get thirdStage
     *
     * @return string 
     */
    public function getThirdStage()
    {
        return $this->thirdStage;
    }

    /**
     * Set fourthStage
     *
     * @param integer $fourthStage
     * @return Course
     */
    public function setFourthStage($fourthStage)
    {
        $this->fourthStage = $fourthStage;

        return $this;
    }

    /**
     * Get fourthStage
     *
     * @return integer 
     */
    public function getFourthStage()
    {
        return $this->fourthStage;
    }

    /**
     * Set fifthStage
     *
     * @param integer $fifthStage
     * @return Course
     */
    public function setFifthStage($fifthStage)
    {
        $this->fifthStage = $fifthStage;

        return $this;
    }

    /**
     * Get fifthStage
     *
     * @return integer 
     */
    public function getFifthStage()
    {
        return $this->fifthStage;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $pois;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pois = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add pois
     *
     * @param \CoreBundle\Entity\Poi $pois
     * @return Course
     */
    public function addPois(\CoreBundle\Entity\Poi $pois)
    {
        $this->pois[] = $pois;

        return $this;
    }

    /**
     * Remove pois
     *
     * @param \CoreBundle\Entity\Poi $pois
     */
    public function removePois(\CoreBundle\Entity\Poi $pois)
    {
        $this->pois->removeElement($pois);
    }

    /**
     * Get pois
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPois()
    {
        return $this->pois;
    }
}
