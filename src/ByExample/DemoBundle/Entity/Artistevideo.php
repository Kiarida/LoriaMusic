<?php

namespace ByExample\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artistevideo
 *
 * @ORM\Table(name="artistevideo")
 * @ORM\Entity
 */
class Artistevideo
{
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
     * Set idartiste
     *
     * @param \ByExample\DemoBundle\Entity\Artiste $idartiste
     * @return Artistevideo
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