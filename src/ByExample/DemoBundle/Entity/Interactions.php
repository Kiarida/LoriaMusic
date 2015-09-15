<?php

namespace ByExample\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Interactions
 *
 * @ORM\Table(name="interactions")
 * @ORM\Entity(repositoryClass="ByExample\DemoBundle\Repository\InteractionRepository")
 */
class Interactions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateHeure", type="datetime", nullable=false)
     */
    private $dateheure;

    /**
     * @var \Typeinteraction
     *
     * @ORM\ManyToOne(targetEntity="Typeinteraction")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idTypeInteraction", referencedColumnName="id")
     * })
     */
    private $idtypeinteraction;

    /**
     * @var \Ecoute
     *
     * @ORM\ManyToOne(targetEntity="Ecoute")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEcoute", referencedColumnName="id")
     * })
     */
    private $idecoute;



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
     * Set dateheure
     *
     * @param \DateTime $dateheure
     * @return Interactions
     */
    public function setDateheure($dateheure)
    {
        $this->dateheure = $dateheure;
    
        return $this;
    }

    /**
     * Get dateheure
     *
     * @return \DateTime 
     */
    public function getDateheure()
    {
        return $this->dateheure;
    }

    /**
     * Set idtypeinteraction
     *
     * @param \ByExample\DemoBundle\Entity\Typeinteraction $idtypeinteraction
     * @return Interactions
     */
    public function setIdtypeinteraction(\ByExample\DemoBundle\Entity\Typeinteraction $idtypeinteraction = null)
    {
        $this->idtypeinteraction = $idtypeinteraction;
    
        return $this;
    }

    /**
     * Get idtypeinteraction
     *
     * @return \ByExample\DemoBundle\Entity\Typeinteraction 
     */
    public function getIdtypeinteraction()
    {
        return $this->idtypeinteraction;
    }

    /**
     * Set idecoute
     *
     * @param \ByExample\DemoBundle\Entity\Ecoute $idecoute
     * @return Interactions
     */
    public function setIdecoute(\ByExample\DemoBundle\Entity\Ecoute $idecoute = null)
    {
        $this->idecoute = $idecoute;
    
        return $this;
    }

    /**
     * Get idecoute
     *
     * @return \ByExample\DemoBundle\Entity\Ecoute 
     */
    public function getIdecoute()
    {
        return $this->idecoute;
    }
}