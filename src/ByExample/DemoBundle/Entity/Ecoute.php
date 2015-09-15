<?php

namespace ByExample\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ecoute
 *
 * @ORM\Table(name="ecoute")
 * @ORM\Entity(repositoryClass="ByExample\DemoBundle\Repository\EcouteRepository")
 */
class Ecoute
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
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="typeEcoute", type="string", length=1, nullable=false)
     */
    private $typeecoute;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Session", mappedBy="idecoute")
     */
    private $idsession;

    /**
     * @var \Item
     *
     * @ORM\ManyToOne(targetEntity="Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idItem", referencedColumnName="id")
     * })
     */
    private $iditem;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idsession = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

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
     * Set date
     *
     * @param \DateTime $date
     * @return Ecoute
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set typeecoute
     *
     * @param string $typeecoute
     * @return Ecoute
     */
    public function setTypeecoute($typeecoute)
    {
        $this->typeecoute = $typeecoute;
    
        return $this;
    }

    /**
     * Get typeecoute
     *
     * @return string 
     */
    public function getTypeecoute()
    {
        return $this->typeecoute;
    }

    /**
     * Add idsession
     *
     * @param \ByExample\DemoBundle\Entity\Session $idsession
     * @return Ecoute
     */
    public function addIdsession(\ByExample\DemoBundle\Entity\Session $idsession)
    {
        $this->idsession[] = $idsession;
    
        return $this;
    }

    /**
     * Remove idsession
     *
     * @param \ByExample\DemoBundle\Entity\Session $idsession
     */
    public function removeIdsession(\ByExample\DemoBundle\Entity\Session $idsession)
    {
        $this->idsession->removeElement($idsession);
    }

    /**
     * Get idsession
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdsession()
    {
        return $this->idsession;
    }

    /**
     * Set iditem
     *
     * @param \ByExample\DemoBundle\Entity\Item $iditem
     * @return Ecoute
     */
    public function setIditem(\ByExample\DemoBundle\Entity\Item $iditem = null)
    {
        $this->iditem = $iditem;
    
        return $this;
    }

    /**
     * Get iditem
     *
     * @return \ByExample\DemoBundle\Entity\Item 
     */
    public function getIditem()
    {
        return $this->iditem;
    }
}