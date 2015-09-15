<?php

namespace ByExample\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artistemusique
 *
 * @ORM\Table(name="artistemusique")
 * @ORM\Entity
 */
class Artistemusique
{
    /**
     * @var integer
     *
     * @ORM\Column(name="hotttness", type="integer", nullable=false)
     */
    private $hotttness;

    /**
     * @var integer
     *
     * @ORM\Column(name="familiarity", type="integer", nullable=false)
     */
    private $familiarity;

    /**
     * @var \Artiste
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Artiste")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idArtiste", referencedColumnName="id")
     * })
     */
    private $idartiste;



    /**
     * Set hotttness
     *
     * @param integer $hotttness
     * @return Artistemusique
     */
    public function setHotttness($hotttness)
    {
        $this->hotttness = $hotttness;
    
        return $this;
    }

    /**
     * Get hotttness
     *
     * @return integer 
     */
    public function getHotttness()
    {
        return $this->hotttness;
    }

    /**
     * Set familiarity
     *
     * @param integer $familiarity
     * @return Artistemusique
     */
    public function setFamiliarity($familiarity)
    {
        $this->familiarity = $familiarity;
    
        return $this;
    }

    /**
     * Get familiarity
     *
     * @return integer 
     */
    public function getFamiliarity()
    {
        return $this->familiarity;
    }

    /**
     * Set idartiste
     *
     * @param \ByExample\DemoBundle\Entity\Artiste $idartiste
     * @return Artistemusique
     */
    public function setIdartiste(\ByExample\DemoBundle\Entity\Artiste $idartiste)
    {
        $this->idartiste = $idartiste;
    
        return $this;
    }

    /**
     * Get idartiste
     *
     * @return \ByExample\DemoBundle\Entity\Artiste 
     */
    public function getIdartiste()
    {
        return $this->idartiste;
    }
}