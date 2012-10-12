<?php

namespace Dau\DauBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Dau\DauBundle\Repository\DauRepository")
 * @ORM\Table(name="photos")
 * @ORM\HasLifecycleCallbacks()
 */
class Photos {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="integer")
     */
    protected $dauId;
    /**
     * @ORM\Column(type="string", length=150)
     */
    protected $photoPath;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $added;

    public function __construct() {
        $this->setAdded(new \DateTime());
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
    public function setDauId($dauId) {
        $this->dauId = $dauId;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getDauId() {
        return $this->dauId;
    }

    /**
     * Set content
     *
     * @param text $content
     */
    public function setPhotoPath($photoPath) {
        $this->photoPath = $photoPath;
    }

    /**
     * Get content
     *
     * @return text 
     */
    public function getPhotoPath() {
        return $this->photoPath;
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

}