<?php

namespace Dau\DauBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Dau\DauBundle\Repository\DauRepository")
 * @ORM\Table(name="dau")
 * @ORM\HasLifecycleCallbacks()
 */
class Dau {

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
    protected $content;

    /**
     * @ORM\Column(type="integer")
     */
    protected $nrRooms;

    /**
     * @ORM\Column(type="integer")
     */
    protected $floor;

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
     * @ORM\Column(type="integer")
     */
    protected $raion;

    /**
     * @ORM\Column(type="string", length=1)
     */
    protected $acceptStatus;

    /**
     * @ORM\Column(type="string", length=250)
     */
    protected $address;

    /**
     * @ORM\Column(type="integer")
     */
    protected $isAgency;

    /**
     * @ORM\Column(type="string", length=5)
     */
    protected $m2;

    /**
     * @ORM\Column(type="integer")
     */
    protected $nrFloors;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $secretHash;

    /**
     * @ORM\Column(type="string", length=15)
     */
    protected $lat;

    /**
     * @ORM\Column(type="string", length=15)
     */
    protected $llong;

    public function __construct() {
        $this->setAdded(new \DateTime());
        $this->setIsAgency(0);
        $secretHash = substr(md5(rand(1, 100) . time() . rand(1, 100)), 0, 50);
        $this->setSecretHash($secretHash);
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
     * Set nrRooms
     *
     * @param integer $nrRooms
     */
    public function setNrRooms($nrRooms) {
        $this->nrRooms = $nrRooms;
    }

    /**
     * Get nrRooms
     *
     * @return integer 
     */
    public function getNrRooms() {
        return $this->nrRooms;
    }

    /**
     * Set floor
     *
     * @param integer $floor
     */
    public function setFloor($floor) {
        $this->floor = $floor;
    }

    /**
     * Get floor
     *
     * @return integer 
     */
    public function getFloor() {
        return $this->floor;
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
     * Set raion
     *
     * @param integer $raion
     */
    public function setRaion($raion) {
        $this->raion = $raion;
    }

    /**
     * Get raion
     *
     * @return integer 
     */
    public function getRaion() {
        return $this->raion;
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

    /**
     * Set isAgency
     *
     * @param integer $isAgency
     */
    public function setIsAgency($isAgency) {
        $this->isAgency = $isAgency;
    }

    /**
     * Get isAgency
     *
     * @return integer 
     */
    public function getIsAgency() {
        return $this->isAgency;
    }

    /**
     * Get isAgency
     *
     * @param string
     */
    public function setAddress($address) {
        $this->address = $address;
    }

    /**
     * Get isAgency
     *
     * @return string 
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * Get isAgency
     *
     * @param string
     */
    public function setM2($m2) {
        $this->m2 = $m2;
    }

    /**
     * Get isAgency
     *
     * @return string
     */
    public function getM2() {
        return $this->m2;
    }

    /**
     * Get isAgency
     *
     * @param integer
     */
    public function setNrFloors($nrFloors) {
        $this->nrFloors = $nrFloors;
    }

    /**
     * Get isAgency
     *
     * @return integer 
     */
    public function getNrFloors() {
        return $this->nrFloors;
    }

    public function setSecretHash($secretHash) {
        $this->secretHash = $secretHash;
    }

    public function getSecretHash() {
        return $this->secretHash;
    }

    public function setLat($lat) {
        $this->lat = $lat;
    }

    public function getLat() {
        return $this->lat;
    }

    public function setLlong($llong) {
        $this->llong = $llong;
    }

    public function getLlong() {
        return $this->llong;
    }

    public function getTitleSlug() {
        $text = preg_replace('#[^\\pL\d]+#u', '-', substr($this->title, 0, 30));

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