<?php

namespace Dau\DauBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dau\DauBundle\Entity\Bots
 */
class Bots
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var text $bot
     */
    private $bot;


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
     * Set bot
     *
     * @param text $bot
     */
    public function setBot($bot)
    {
        $this->bot = $bot;
    }

    /**
     * Get bot
     *
     * @return text 
     */
    public function getBot()
    {
        return $this->bot;
    }
}