<?php

namespace ByExample\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artistegenre
 *
 * @ORM\Table(name="artistegenre")
 * @ORM\Entity
 */
class Artistegenre
{
    /**
     * @var decimal
     *
     * @ORM\Column(name="frequency", type="decimal", nullable=true)
     */
    private $frequency;

    /**
     * @var decimal
     *
     * @ORM\Column(name="weight", type="decimal", nullable=true)
     */
    private $weight;

     /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\Id @ORM\ManyToOne(targetEntity="Artiste")
     * @ORM\JoinColumn(name="idArtiste", referencedColumnName="id")
     **/
    private $idartiste;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\Id @ORM\ManyToOne(targetEntity="Genre")
     * @ORM\JoinColumn(name="idGenre", referencedColumnName="id")
     **/
    private $idgenre;




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