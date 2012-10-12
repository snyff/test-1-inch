<?php

namespace Dau\DauBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dau\DauBundle\Entity\ClothesList
 */
class ClothesList
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $title
     */
    private $title;

    /**
     * @var text $annonce
     */
    private $annonce;

    /**
     * @var string $articol
     */
    private $articol;

    /**
     * @var string $marime
     */
    private $marime;

    /**
     * @var string $color
     */
    private $color;

    /**
     * @var string $fix
     */
    private $fix;

    /**
     * @var string $mobil
     */
    private $mobil;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var integer $price
     */
    private $price;

    /**
     * @var string $currency
     */
    private $currency;

    /**
     * @var integer $userid
     */
    private $userid;


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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set annonce
     *
     * @param text $annonce
     */
    public function setAnnonce($annonce)
    {
        $this->annonce = $annonce;
    }

    /**
     * Get annonce
     *
     * @return text 
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }

    /**
     * Set articol
     *
     * @param string $articol
     */
    public function setArticol($articol)
    {
        $this->articol = $articol;
    }

    /**
     * Get articol
     *
     * @return string 
     */
    public function getArticol()
    {
        return $this->articol;
    }

    /**
     * Set marime
     *
     * @param string $marime
     */
    public function setMarime($marime)
    {
        $this->marime = $marime;
    }

    /**
     * Get marime
     *
     * @return string 
     */
    public function getMarime()
    {
        return $this->marime;
    }

    /**
     * Set color
     *
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set fix
     *
     * @param string $fix
     */
    public function setFix($fix)
    {
        $this->fix = $fix;
    }

    /**
     * Get fix
     *
     * @return string 
     */
    public function getFix()
    {
        return $this->fix;
    }

    /**
     * Set mobil
     *
     * @param string $mobil
     */
    public function setMobil($mobil)
    {
        $this->mobil = $mobil;
    }

    /**
     * Get mobil
     *
     * @return string 
     */
    public function getMobil()
    {
        return $this->mobil;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set price
     *
     * @param integer $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set currency
     *
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * Get currency
     *
     * @return string 
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set userid
     *
     * @param integer $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * Get userid
     *
     * @return integer 
     */
    public function getUserid()
    {
        return $this->userid;
    }
}