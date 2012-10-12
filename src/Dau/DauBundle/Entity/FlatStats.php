<?php

namespace Dau\DauBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dau\DauBundle\Entity\FlatStats
 */
class FlatStats
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $ip
     */
    private $ip;

    /**
     * @var datetime $time
     */
    private $time;

    /**
     * @var string $browser
     */
    private $browser;

    /**
     * @var integer $idFlat
     */
    private $idFlat;


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

    /**
     * Set time
     *
     * @param datetime $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * Get time
     *
     * @return datetime 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set browser
     *
     * @param string $browser
     */
    public function setBrowser($browser)
    {
        $this->browser = $browser;
    }

    /**
     * Get browser
     *
     * @return string 
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * Set idFlat
     *
     * @param integer $idFlat
     */
    public function setIdFlat($idFlat)
    {
        $this->idFlat = $idFlat;
    }

    /**
     * Get idFlat
     *
     * @return integer 
     */
    public function getIdFlat()
    {
        return $this->idFlat;
    }
}