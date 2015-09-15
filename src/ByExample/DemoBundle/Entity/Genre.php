<?php

namespace ByExample\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genre
 *
 * @ORM\Table(name="genre")
 * @ORM\Entity(repositoryClass="ByExample\DemoBundle\Repository\GenreRepository")
 */
class Genre
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
     * @ORM\Column(name="libelle", type="string", length=25, nullable=false)
     */
    private $libelle;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Artiste", mappedBy="idgenre")
     */
    private $idartiste;

    /**
    *@var string
    *
    *@ORM\Column(name="urlCover", type="string", length=256, nullable=false)
    **/
    private $urlCover;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->iditem = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set libelle
     *
     * @param string $libelle
     * @return Genre
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    
        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Add idartiste
     *
     * @param \ByExample\DemoBundle\Entity\Artiste $idartiste
     * @return Genre
     */
    public function addIdartiste(\ByExample\DemoBundle\Entity\Artiste $idartiste)
    {
        $this->idartiste[] = $idartiste;
    
        return $this;
    }

    /**
     * Remove idartiste
     *
     * @param \ByExample\DemoBundle\Entity\Artiste $idartiste
     */
    public function removeIdartiste(\ByExample\DemoBundle\Entity\Artiste $idartiste)
    {
        $this->idartiste->removeElement($idartiste);
    }

    /**
     * Get idartiste
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdartiste()
    {
        return $this->idartiste;
    }


    /**
     * Get urlCover
     *
     * @return string 
     */
    public function getUrlCover()
    {
        return $this->urlCover;
    }

    /**
     * Set urlCover
     *
     * @param string $cover
     * @return Genre
     */
    public function setUrlCover($cover)
    {
        $this->urlCover = $cover;
    
        return $this;
    }




}