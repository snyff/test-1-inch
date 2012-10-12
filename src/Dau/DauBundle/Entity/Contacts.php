<?php

namespace Dau\DauBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dau\DauBundle\Entity\Contacts
 */
class Contacts {

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var string $subject
     */
    private $subject;

    /**
     * @var text $content
     */
    private $content;

    /**
     * @var string $browser
     */
    private $browser;

    /**
     * @var string $added
     */
    private $added;

    public function __construct() {
        $this->setAdded(new \DateTime());
        $this->setBrowser($_SERVER['HTTP_USER_AGENT']);
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set subject
     *
     * @param string $subject
     */
    public function setSubject($subject) {
        $this->subject = $subject;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject() {
        return $this->subject;
    }

    /**
     * Set content
     *
     * @param text $content
     */
    public function setContent($content) {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return text 
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * Set browser
     *
     * @param string $browser
     */
    public function setBrowser($browser) {
        $this->browser = $browser;
    }

    /**
     * Get browser
     *
     * @return string 
     */
    public function getBrowser() {
        return $this->browser;
    }

    /**
     * Set added
     *
     * @param string $added
     */
    public function setAdded($added) {
        $this->added = $added;
    }

    /**
     * Get added
     *
     * @return string 
     */
    public function getAdded() {
        return $this->added;
    }

}