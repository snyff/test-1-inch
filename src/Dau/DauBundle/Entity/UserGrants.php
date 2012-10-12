<?php

namespace Dau\DauBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dau\DauBundle\Entity\UserGrants
 */
class UserGrants
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $userid
     */
    private $userid;

    /**
     * @var integer $stats
     */
    private $stats;

    /**
     * @var integer $admins
     */
    private $admins;

    /**
     * @var integer $list
     */
    private $list;

    /**
     * @var integer $advertising
     */
    private $advertising;

    /**
     * @var integer $translations
     */
    private $translations;

    /**
     * @var integer $db
     */
    private $db;

    /**
     * @var integer $users
     */
    private $users;


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
     * Set stats
     *
     * @param integer $stats
     */
    public function setStats($stats)
    {
        $this->stats = $stats;
    }

    /**
     * Get stats
     *
     * @return integer 
     */
    public function getStats()
    {
        return $this->stats;
    }

    /**
     * Set admins
     *
     * @param integer $admins
     */
    public function setAdmins($admins)
    {
        $this->admins = $admins;
    }

    /**
     * Get admins
     *
     * @return integer 
     */
    public function getAdmins()
    {
        return $this->admins;
    }

    /**
     * Set list
     *
     * @param integer $list
     */
    public function setList($list)
    {
        $this->list = $list;
    }

    /**
     * Get list
     *
     * @return integer 
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * Set advertising
     *
     * @param integer $advertising
     */
    public function setAdvertising($advertising)
    {
        $this->advertising = $advertising;
    }

    /**
     * Get advertising
     *
     * @return integer 
     */
    public function getAdvertising()
    {
        return $this->advertising;
    }

    /**
     * Set translations
     *
     * @param integer $translations
     */
    public function setTranslations($translations)
    {
        $this->translations = $translations;
    }

    /**
     * Get translations
     *
     * @return integer 
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * Set db
     *
     * @param integer $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

    /**
     * Get db
     *
     * @return integer 
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * Set users
     *
     * @param integer $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }

    /**
     * Get users
     *
     * @return integer 
     */
    public function getUsers()
    {
        return $this->users;
    }
}