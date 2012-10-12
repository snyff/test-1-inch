<?php

namespace Dau\DauBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dau\DauBundle\Entity\Subs
 */
class Subs
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $raion
     */
    private $raion;

    /**
     * @var integer $nrRooms
     */
    private $nrRooms;

    /**
     * @var integer $fromPrice
     */
    private $fromPrice;

    /**
     * @var integer $toPrice
     */
    private $toPrice;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var string $valuta
     */
    private $valuta;

    /**
     * @var string $unsubs
     */
    private $unsubs;

    /**
     * @var datetime $dateSubs
     */
    private $dateSubs;

    /**
     * @var integer $etaj
     */
    private $etaj;

    /**
     * @var string $receiveStatus
     */
    private $receiveStatus;

    /**
     * @var string $lang
     */
    private $lang;

    /**
     * @var string $ip
     */
    private $ip;


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
     * Set raion
     *
     * @param integer $raion
     */
    public function setRaion($raion)
    {
        $this->raion = $raion;
    }

    /**
     * Get raion
     *
     * @return integer 
     */
    public function getRaion()
    {
        return $this->raion;
    }

    /**
     * Set nrRooms
     *
     * @param integer $nrRooms
     */
    public function setNrRooms($nrRooms)
    {
        $this->nrRooms = $nrRooms;
    }

    /**
     * Get nrRooms
     *
     * @return integer 
     */
    public function getNrRooms()
    {
        return $this->nrRooms;
    }

    /**
     * Set fromPrice
     *
     * @param integer $fromPrice
     */
    public function setFromPrice($fromPrice)
    {
        $this->fromPrice = $fromPrice;
    }

    /**
     * Get fromPrice
     *
     * @return integer 
     */
    public function getFromPrice()
    {
        return $this->fromPrice;
    }

    /**
     * Set toPrice
     *
     * @param integer $toPrice
     */
    public function setToPrice($toPrice)
    {
        $this->toPrice = $toPrice;
    }

    /**
     * Get toPrice
     *
     * @return integer 
     */
    public function getToPrice()
    {
        return $this->toPrice;
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
     * Set valuta
     *
     * @param string $valuta
     */
    public function setValuta($valuta)
    {
        $this->valuta = $valuta;
    }

    /**
     * Get valuta
     *
     * @return string 
     */
    public function getValuta()
    {
        return $this->valuta;
    }

    /**
     * Set unsubs
     *
     * @param string $unsubs
     */
    public function setUnsubs($unsubs)
    {
        $this->unsubs = $unsubs;
    }

    /**
     * Get unsubs
     *
     * @return string 
     */
    public function getUnsubs()
    {
        return $this->unsubs;
    }

    /**
     * Set dateSubs
     *
     * @param datetime $dateSubs
     */
    public function setDateSubs($dateSubs)
    {
        $this->dateSubs = $dateSubs;
    }

    /**
     * Get dateSubs
     *
     * @return datetime 
     */
    public function getDateSubs()
    {
        return $this->dateSubs;
    }

    /**
     * Set etaj
     *
     * @param integer $etaj
     */
    public function setEtaj($etaj)
    {
        $this->etaj = $etaj;
    }

    /**
     * Get etaj
     *
     * @return integer 
     */
    public function getEtaj()
    {
        return $this->etaj;
    }

    /**
     * Set receiveStatus
     *
     * @param string $receiveStatus
     */
    public function setReceiveStatus($receiveStatus)
    {
        $this->receiveStatus = $receiveStatus;
    }

    /**
     * Get receiveStatus
     *
     * @return string 
     */
    public function getReceiveStatus()
    {
        return $this->receiveStatus;
    }

    /**
     * Set lang
     *
     * @param string $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    /**
     * Get lang
     *
     * @return string 
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set ip
     *
     * @param string $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }
}