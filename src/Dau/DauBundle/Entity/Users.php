<?php

namespace Dau\DauBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dau\DauBundle\Entity\Users
 */
class Users
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $pass
     */
    private $pass;

    /**
     * @var string $ip
     */
    private $ip;

    /**
     * @var datetime $timp
     */
    private $timp;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var string $lastName
     */
    private $lastName;

    /**
     * @var string $firstName
     */
    private $firstName;

    /**
     * @var integer $activated
     */
    private $activated;

    /**
     * @var string $confirmCode
     */
    private $confirmCode;

    /**
     * @var bigint $dff
     */
    private $dff;

    /**
     * @var integer $fastUser
     */
    private $fastUser;

    /**
     * @var string $lang
     */
    private $lang;


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
     * Set timp
     *
     * @param datetime $timp
     */
    public function setTimp($timp)
    {
        $this->timp = $timp;
    }

    /**
     * Get timp
     *
     * @return datetime 
     */
    public function getTimp()
    {
        return $this->timp;
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
     * Set lastName
     *
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set activated
     *
     * @param integer $activated
     */
    public function setActivated($activated)
    {
        $this->activated = $activated;
    }

    /**
     * Get activated
     *
     * @return integer 
     */
    public function getActivated()
    {
        return $this->activated;
    }

    /**
     * Set confirmCode
     *
     * @param string $confirmCode
     */
    public function setConfirmCode($confirmCode)
    {
        $this->confirmCode = $confirmCode;
    }

    /**
     * Get confirmCode
     *
     * @return string 
     */
    public function getConfirmCode()
    {
        return $this->confirmCode;
    }

    /**
     * Set dff
     *
     * @param bigint $dff
     */
    public function setDff($dff)
    {
        $this->dff = $dff;
    }

    /**
     * Get dff
     *
     * @return bigint 
     */
    public function getDff()
    {
        return $this->dff;
    }

    /**
     * Set fastUser
     *
     * @param integer $fastUser
     */
    public function setFastUser($fastUser)
    {
        $this->fastUser = $fastUser;
    }

    /**
     * Get fastUser
     *
     * @return integer 
     */
    public function getFastUser()
    {
        return $this->fastUser;
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
}