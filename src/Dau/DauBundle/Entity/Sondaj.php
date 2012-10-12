<?php

namespace Dau\DauBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dau\DauBundle\Entity\Sondaj
 */
class Sondaj
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var text $text
     */
    private $text;

    /**
     * @var string $ip
     */
    private $ip;

    /**
     * @var text $browser
     */
    private $browser;

    /**
     * @var datetime $addDate
     */
    private $addDate;


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
     * Set text
     *
     * @param text $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Get text
     *
     * @return text 
     */
    public function getText()
    {
        return $this->text;
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
     * Set browser
     *
     * @param text $browser
     */
    public function setBrowser($browser)
    {
        $this->browser = $browser;
    }

    /**
     * Get browser
     *
     * @return text 
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * Set addDate
     *
     * @param datetime $addDate
     */
    public function setAddDate($addDate)
    {
        $this->addDate = $addDate;
    }

    /**
     * Get addDate
     *
     * @return datetime 
     */
    public function getAddDate()
    {
        return $this->addDate;
    }
}