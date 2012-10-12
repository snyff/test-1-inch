<?php

namespace Dau\DauBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dau\DauBundle\Entity\Translations
 */
class Translations
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var text $eng
     */
    private $eng;

    /**
     * @var text $rom
     */
    private $rom;

    /**
     * @var text $rus
     */
    private $rus;

    /**
     * @var text $fra
     */
    private $fra;


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
     * Set eng
     *
     * @param text $eng
     */
    public function setEng($eng)
    {
        $this->eng = $eng;
    }

    /**
     * Get eng
     *
     * @return text 
     */
    public function getEng()
    {
        return $this->eng;
    }

    /**
     * Set rom
     *
     * @param text $rom
     */
    public function setRom($rom)
    {
        $this->rom = $rom;
    }

    /**
     * Get rom
     *
     * @return text 
     */
    public function getRom()
    {
        return $this->rom;
    }

    /**
     * Set rus
     *
     * @param text $rus
     */
    public function setRus($rus)
    {
        $this->rus = $rus;
    }

    /**
     * Get rus
     *
     * @return text 
     */
    public function getRus()
    {
        return $this->rus;
    }

    /**
     * Set fra
     *
     * @param text $fra
     */
    public function setFra($fra)
    {
        $this->fra = $fra;
    }

    /**
     * Get fra
     *
     * @return text 
     */
    public function getFra()
    {
        return $this->fra;
    }
}