<?php

namespace Dau\DauBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dau\DauBundle\Entity\Adm
 */
class Adm
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $nick
     */
    private $nick;

    /**
     * @var string $pass
     */
    private $pass;

    /**
     * @var integer $master
     */
    private $master;


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
     * Set nick
     *
     * @param string $nick
     */
    public function setNick($nick)
    {
        $this->nick = $nick;
    }

    /**
     * Get nick
     *
     * @return string 
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * Set pass
     *
     * @param string $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * Get pass
     *
     * @return string 
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set master
     *
     * @param integer $master
     */
    public function setMaster($master)
    {
        $this->master = $master;
    }

    /**
     * Get master
     *
     * @return integer 
     */
    public function getMaster()
    {
        return $this->master;
    }
}