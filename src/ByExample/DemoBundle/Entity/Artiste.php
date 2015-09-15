<?php

namespace ByExample\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artiste
 *
 * @ORM\Table(name="artiste")
 * @ORM\Entity(repositoryClass="ByExample\DemoBundle\Repository\ArtisteRepository")
 */
class Artiste
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
     * @var decimal
     *
     * @ORM\Column(name="note", type="decimal", precision=5, scale=2, nullable=false)
     */
    private $note;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Item", mappedBy="idartiste", fetch="LAZY")
     */
    private $iditem;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tag", mappedBy="idartiste")
     */
    private $idtag;

    /**
     * @var string
     *
     * @ORM\Column(name="urlCover", type="string", length=256, nullable=false)
     */
    private $urlCover;

       /**
     * @var integer
     *
     * @ORM\Column(name="idEcho", type="integer", nullable=false)
     */
    private $idecho;

   /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Artiste", inversedBy="idartiste", fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="artistesimilaire",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idArtiste", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idSim", referencedColumnName="id")
     *   }
     * )
     */
    private $idartistesim;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Genre", inversedBy="idartiste", fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="artistegenre",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idArtiste", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idGenre", referencedColumnName="id")
     *   }
     * )
     */
    private $idgenre;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->iditem = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Artiste
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
     * Set note
     *
     * @param decimal $note
     * @return Artiste
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get cover
     *
     * @return string
     */
    public function getUrlCover()
    {
        return $this->urlCover;
    }

    /**
     * Set cover
     *
     * @param string $url
     * @return Artiste
     */
    public function setUrlCover($url)
    {
        $this->urlCover = $url;

        return $this;
    }

    /**
     * Get note
     *
     * @return decimal 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Add iditem
     *
     * @param \ByExample\DemoBundle\Entity\Item $iditem
     * @return Artiste
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
     * Add idtag
     *
     * @param \ByExample\DemoBundle\Entity\Tag $idtag
     * @return Artiste
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
     * Set idecho
     *
     * @param string $idecho
     * @return Artiste
     */
    public function setIdecho($idecho)
    {
        $this->idecho = $idecho;

        return $this;
    }

    /**
     * Get idecho
     *
     * @return string
     */
    public function getIdecho()
    {
        return $this->idecho;
    }


    /**
     * Add idgenre
     *
     * @param \ByExample\DemoBundle\Entity\Genre $idgenre
     * @return Item
     */
    public function addIdgenre(\ByExample\DemoBundle\Entity\Genre $idgenre)
    {
        $this->idgenre[] = $idgenre;

        return $this;
    }

    /**
     * Remove idgenre
     *
     * @param \ByExample\DemoBundle\Entity\Genre $idgenre
     */
    public function removeIdgenre(\ByExample\DemoBundle\Entity\Genre $idgenre)
    {
        $this->idgenre->removeElement($idgenre);
    }

    /**
     * Get idgenre
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdgenre()
    {
        return $this->idgenre;
    }
}
