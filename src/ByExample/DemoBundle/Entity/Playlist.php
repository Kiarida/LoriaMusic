<?php

namespace ByExample\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Playlist
 *
 * @ORM\Table(name="playlist")
 * @ORM\Entity(repositoryClass="ByExample\DemoBundle\Repository\PlaylistRepository")
 */
class Playlist
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
     * @ORM\Column(name="nom", type="string", length=25, nullable=false)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="date", nullable=false)
     */
    private $datecreation;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Item", inversedBy="idplaylist")
     * @ORM\JoinTable(name="itemplaylist",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idPlaylist", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idItem", referencedColumnName="id")
     *   }
     * )
     */
    private $iditem;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Session", inversedBy="idplaylist")
     * @ORM\JoinTable(name="sessionplaylist",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idPlaylist", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idSession", referencedColumnName="id")
     *   }
     * )
     */
    private $idsession;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tag", mappedBy="idplaylist")
     */
    private $idtag;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUtilisateur", referencedColumnName="id")
     * })
     */
    private $idutilisateur;


     /**
      * @var \Doctrine\Common\Collections\Collection
      *
      * @ORM\OneToMany(targetEntity="PlaylistItem", mappedBy="idplaylist")
      *
      */
     private $idplaylistitem;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->iditem = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idsession = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idtag = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     * @return Playlist
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set datecreation
     *
     * @param \DateTime $datecreation
     * @return Playlist
     */
    public function setDatecreation($datecreation)
    {
        $this->datecreation = $datecreation;
    
        return $this;
    }

    /**
     * Get datecreation
     *
     * @return \DateTime 
     */
    public function getDatecreation()
    {
        return $this->datecreation;
    }

    /**
     * Add iditem
     *
     * @param \ByExample\DemoBundle\Entity\Item $iditem
     * @return Playlist
     */
    public function addIditem(\ByExample\DemoBundle\Entity\Item $iditem)
    {
        $this->iditem[] = $iditem;
    
        return $this;
    }

    /**
     * Remove iditem
     *
     * @param \ByExample\DemoBundle\Entity\Item $iditem
     */
    public function removeIditem(\ByExample\DemoBundle\Entity\Item $iditem)
    {
        $this->iditem->removeElement($iditem);
    }

    /**
     * Get iditem
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIditem()
    {
        return $this->iditem;
    }

    /**
     * Add idsession
     *
     * @param \ByExample\DemoBundle\Entity\Session $idsession
     * @return Playlist
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
     * Add idtag
     *
     * @param \ByExample\DemoBundle\Entity\Tag $idtag
     * @return Playlist
     */
    public function addIdtag(\ByExample\DemoBundle\Entity\Tag $idtag)
    {
        $this->idtag[] = $idtag;
    
        return $this;
    }

    /**
     * Remove idtag
     *
     * @param \ByExample\DemoBundle\Entity\Tag $idtag
     */
    public function removeIdtag(\ByExample\DemoBundle\Entity\Tag $idtag)
    {
        $this->idtag->removeElement($idtag);
    }

    /**
     * Get idtag
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdtag()
    {
        return $this->idtag;
    }

    /**
     * Set idutilisateur
     *
     * @param \ByExample\DemoBundle\Entity\Utilisateur $idutilisateur
     * @return Playlist
     */
    public function setIdutilisateur(\ByExample\DemoBundle\Entity\Utilisateur $idutilisateur = null)
    {
        $this->idutilisateur = $idutilisateur;
    
        return $this;
    }

    /**
     * Get idutilisateur
     *
     * @return \ByExample\DemoBundle\Entity\Utilisateur 
     */
    public function getIdutilisateur()
    {
        return $this->idutilisateur;
    }
}