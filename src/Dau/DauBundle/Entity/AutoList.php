<?php

namespace Dau\DauBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dau\DauBundle\Entity\AutoList
 */
class AutoList
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
     * @var string $marca
     */
    private $marca;

    /**
     * @var smallint $autoYear
     */
    private $autoYear;

    /**
     * @var integer $typeFuel
     */
    private $typeFuel;

    /**
     * @var float $capacitateCil
     */
    private $capacitateCil;

    /**
     * @var integer $cutieViteza
     */
    private $cutieViteza;

    /**
     * @var string $fix
     */
    private $fix;

    /**
     * @var string $mobil
     */
    private $mobil;

    /**
     * @var string $url
     */
    private $url;

    /**
     * @var integer $salonPiele
     */
    private $salonPiele;

    /**
     * @var integer $aerConditionat
     */
    private $aerConditionat;

    /**
     * @var integer $cdMp3
     */
    private $cdMp3;

    /**
     * @var integer $userid
     */
    private $userid;

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
     * Set marca
     *
     * @param string $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * Get marca
     *
     * @return string 
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set autoYear
     *
     * @param smallint $autoYear
     */
    public function setAutoYear($autoYear)
    {
        $this->autoYear = $autoYear;
    }

    /**
     * Get autoYear
     *
     * @return smallint 
     */
    public function getAutoYear()
    {
        return $this->autoYear;
    }

    /**
     * Set typeFuel
     *
     * @param integer $typeFuel
     */
    public function setTypeFuel($typeFuel)
    {
        $this->typeFuel = $typeFuel;
    }

    /**
     * Get typeFuel
     *
     * @return integer 
     */
    public function getTypeFuel()
    {
        return $this->typeFuel;
    }

    /**
     * Set capacitateCil
     *
     * @param float $capacitateCil
     */
    public function setCapacitateCil($capacitateCil)
    {
        $this->capacitateCil = $capacitateCil;
    }

    /**
     * Get capacitateCil
     *
     * @return float 
     */
    public function getCapacitateCil()
    {
        return $this->capacitateCil;
    }

    /**
     * Set cutieViteza
     *
     * @param integer $cutieViteza
     */
    public function setCutieViteza($cutieViteza)
    {
        $this->cutieViteza = $cutieViteza;
    }

    /**
     * Get cutieViteza
     *
     * @return integer 
     */
    public function getCutieViteza()
    {
        return $this->cutieViteza;
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
     * Set url
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set salonPiele
     *
     * @param integer $salonPiele
     */
    public function setSalonPiele($salonPiele)
    {
        $this->salonPiele = $salonPiele;
    }

    /**
     * Get salonPiele
     *
     * @return integer 
     */
    public function getSalonPiele()
    {
        return $this->salonPiele;
    }

    /**
     * Set aerConditionat
     *
     * @param integer $aerConditionat
     */
    public function setAerConditionat($aerConditionat)
    {
        $this->aerConditionat = $aerConditionat;
    }

    /**
     * Get aerConditionat
     *
     * @return integer 
     */
    public function getAerConditionat()
    {
        return $this->aerConditionat;
    }

    /**
     * Set cdMp3
     *
     * @param integer $cdMp3
     */
    public function setCdMp3($cdMp3)
    {
        $this->cdMp3 = $cdMp3;
    }

    /**
     * Get cdMp3
     *
     * @return integer 
     */
    public function getCdMp3()
    {
        return $this->cdMp3;
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
}