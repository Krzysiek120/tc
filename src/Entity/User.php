<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=12,nullable=true)
     */
    private $phone;

    /**
     * @var float
     *
     * @ORM\Column(name="cash", type="float", nullable=true, options={"default" : 0})
     */
    private $cash;


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get phone
     *
     * @return String
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set phone
     *
     * @param String $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get cash
     *
     * @return Float
     */
    public function getCash()
    {
        return $this->cash;
    }

    /**
     * Set cash
     *
     * @param Float $cash
     * @return User
     */
    public function setCash($cash)
    {
        $this->cash = $cash;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @param mixed $services
     * @return User
     */
    public function setServices($services)
    {
        $this->services = $services;
        return $this;
    }

}