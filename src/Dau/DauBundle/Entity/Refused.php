<?php

namespace Dau\DauBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dau\DauBundle\Entity\Refused
 */
class Refused
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $appId
     */
    private $appId;

    /**
     * @var integer $userid
     */
    private $userid;

    /**
     * @var text $refMess
     */
    private $refMess;

    /**
     * @var datetime $addDate
     */
    private $addDate;

    /**
     * @var integer $deleted
     */
    private $deleted;


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
     * Set appId
     *
     * @param integer $appId
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;
    }

    /**
     * Get appId
     *
     * @return integer 
     */
    public function getAppId()
    {
        return $this->appId;
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
     * Set refMess
     *
     * @param text $refMess
     */
    public function setRefMess($refMess)
    {
        $this->refMess = $refMess;
    }

    /**
     * Get refMess
     *
     * @return text 
     */
    public function getRefMess()
    {
        return $this->refMess;
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

    /**
     * Set deleted
     *
     * @param integer $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    /**
     * Get deleted
     *
     * @return integer 
     */
    public function getDeleted()
    {
        return $this->deleted;
    }
}