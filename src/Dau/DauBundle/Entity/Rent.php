<?php

namespace Dau\DauBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Dau\DauBundle\Repository\DauRepository")
 * @ORM\Table(name="rent")
 * @ORM\HasLifecycleCallbacks()
 */
class Rent {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=200)
     */
    protected $title;
    /**
     * @ORM\Column(type="text")
     */
    protected $annonce;
    /**
     * @ORM\Column(type="integer")
     */
    protected $price;
    /**
     * @ORM\Column(type="string", length=11)
     */
    protected $fix;
    /**
     * @ORM\Column(type="string", length=11)
     */
    protected $mobil;
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $email;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $added;
    /**
     * @ORM\Column(type="string", length=1)
     */
    protected $acceptStatus;

    public function __construct() {
        $this->setAdded(new \DateTime());
        $this->setAcceptStatus('w');
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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param text $content
     */
    public function setAnnonce($annonce) {
        $this->annonce = $annonce;
    }

    /**
     * Get content
     *
     * @return text 
     */
    public function getAnnonce() {
        return $this->annonce;
    }

    /**
     * Set email
     *
     * @param text $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return text 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set price
     *
     * @param integer $price
     */
    public function setPrice($price) {
        $this->price = $price;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * Set fix
     *
     * @param string $fix
     */
    public function setFix($fix) {
        $this->fix = $fix;
    }

    /**
     * Get fix
     *
     * @return string 
     */
    public function getFix() {
        return $this->fix;
    }

    /**
     * Set mobil
     *
     * @param string $mobil
     */
    public function setMobil($mobil) {
        $this->mobil = $mobil;
    }

    /**
     * Get mobil
     *
     * @return string 
     */
    public function getMobil() {
        return $this->mobil;
    }

    /**
     * Set added
     *
     * @param datetime $added
     */
    public function setAdded($added) {
        $this->added = $added;
    }

    /**
     * Get added
     *
     * @return datetime 
     */
    public function getAdded() {
        return $this->added;
    }

    /**
     * Set acceptStatus
     *
     * @param string $acceptStatus
     */
    public function setAcceptStatus($acceptStatus) {
        $this->acceptStatus = $acceptStatus;
    }

    /**
     * Get acceptStatus
     *
     * @return string 
     */
    public function getAcceptStatus() {
        return $this->acceptStatus;
    }

    public function getTitleSlug() {
        $text = preg_replace('#[^\\pL\d]+#u', '-', $this->title);

        // trim
        $text = trim($text, '-');

        // transliterate
        if (function_exists('iconv')) {
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        }

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('#[^-\w]+#', '', $text);

        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }

}