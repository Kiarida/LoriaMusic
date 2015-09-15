<?php

namespace ByExample\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Langue
 *
 * @ORM\Table(name="langue")
 * @ORM\Entity
 */
class Langue
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
     * @var string
     *
     * @ORM\Column(name="langue", type="string", length=25, nullable=false)
     */
    private $langue;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Video", mappedBy="idlangue")
     */
    private $idvideo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idvideo = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set langue
     *
     * @param string $langue
     * @return Langue
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;
    
        return $this;
    }

    /**
     * Get langue
     *
     * @return string 
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * Add idvideo
     *
     * @param \ByExample\DemoBundle\Entity\Video $idvideo
     * @return Langue
     */
    public function addIdvideo(\ByExample\DemoBundle\Entity\Video $idvideo)
    {
        $this->idvideo[] = $idvideo;
    
        return $this;
    }

    /**
     * Remove idvideo
     *
     * @param \ByExample\DemoBundle\Entity\Video $idvideo
     */
    public function removeIdvideo(\ByExample\DemoBundle\Entity\Video $idvideo)
    {
        $this->idvideo->removeElement($idvideo);
    }

    /**
     * Get idvideo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdvideo()
    {
        return $this->idvideo;
    }
}