<?php

namespace Dau\DauBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dau\DauBundle\Entity\News
 */
class News
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var datetime $dateAdded
     */
    private $dateAdded;

    /**
     * @var string $shortTextRo
     */
    private $shortTextRo;

    /**
     * @var text $longTextRo
     */
    private $longTextRo;

    /**
     * @var string $shortTextRu
     */
    private $shortTextRu;

    /**
     * @var text $longTextRu
     */
    private $longTextRu;

    /**
     * @var string $shortTextEn
     */
    private $shortTextEn;

    /**
     * @var text $longTextEn
     */
    private $longTextEn;


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
     * Set dateAdded
     *
     * @param datetime $dateAdded
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;
    }

    /**
     * Get dateAdded
     *
     * @return datetime 
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Set shortTextRo
     *
     * @param string $shortTextRo
     */
    public function setShortTextRo($shortTextRo)
    {
        $this->shortTextRo = $shortTextRo;
    }

    /**
     * Get shortTextRo
     *
     * @return string 
     */
    public function getShortTextRo()
    {
        return $this->shortTextRo;
    }

    /**
     * Set longTextRo
     *
     * @param text $longTextRo
     */
    public function setLongTextRo($longTextRo)
    {
        $this->longTextRo = $longTextRo;
    }

    /**
     * Get longTextRo
     *
     * @return text 
     */
    public function getLongTextRo()
    {
        return $this->longTextRo;
    }

    /**
     * Set shortTextRu
     *
     * @param string $shortTextRu
     */
    public function setShortTextRu($shortTextRu)
    {
        $this->shortTextRu = $shortTextRu;
    }

    /**
     * Get shortTextRu
     *
     * @return string 
     */
    public function getShortTextRu()
    {
        return $this->shortTextRu;
    }

    /**
     * Set longTextRu
     *
     * @param text $longTextRu
     */
    public function setLongTextRu($longTextRu)
    {
        $this->longTextRu = $longTextRu;
    }

    /**
     * Get longTextRu
     *
     * @return text 
     */
    public function getLongTextRu()
    {
        return $this->longTextRu;
    }

    /**
     * Set shortTextEn
     *
     * @param string $shortTextEn
     */
    public function setShortTextEn($shortTextEn)
    {
        $this->shortTextEn = $shortTextEn;
    }

    /**
     * Get shortTextEn
     *
     * @return string 
     */
    public function getShortTextEn()
    {
        return $this->shortTextEn;
    }

    /**
     * Set longTextEn
     *
     * @param text $longTextEn
     */
    public function setLongTextEn($longTextEn)
    {
        $this->longTextEn = $longTextEn;
    }

    /**
     * Get longTextEn
     *
     * @return text 
     */
    public function getLongTextEn()
    {
        return $this->longTextEn;
    }
}