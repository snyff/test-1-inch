<?php

namespace Dau\DauBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dau\DauBundle\Entity\FriendMail
 */
class FriendMail
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $fromName
     */
    private $fromName;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var string $friendName
     */
    private $friendName;

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
     * Set fromName
     *
     * @param string $fromName
     */
    public function setFromName($fromName)
    {
        $this->fromName = $fromName;
    }

    /**
     * Get fromName
     *
     * @return string 
     */
    public function getFromName()
    {
        return $this->fromName;
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
     * Set friendName
     *
     * @param string $friendName
     */
    public function setFriendName($friendName)
    {
        $this->friendName = $friendName;
    }

    /**
     * Get friendName
     *
     * @return string 
     */
    public function getFriendName()
    {
        return $this->friendName;
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