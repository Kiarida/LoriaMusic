<?php

namespace ByExample\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Item
*
* @ORM\Table(name="item")
* @ORM\Entity(repositoryClass="ByExample\DemoBundle\Repository\ItemRepository")
*/
class Item
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
    * @ORM\Column(name="url", type="string", length=255, nullable=false)
    */
    private $url;

    /**
    * @var string
    *
    * @ORM\Column(name="titre", type="string", length=255, nullable=false)
    */
    private $titre;

    /**
    * @var string
    *
    * @ORM\Column(name="YouTubeVideoId", type="string", length=255, nullable=true)
    */
    private $YouTubeVideoId;

    /**
    * @var decimal
    *
    * @ORM\Column(name="note", type="decimal", precision=5, scale=2, nullable=false)
    */
    private $note;

    /**
    * @var decimal
    *
    * @ORM\Column(name="duree", type="decimal", precision=6, scale=3, nullable=false)
    */
    private $duree;

    /**
    * @var integer
    *
    * @ORM\Column(name="typeItem", type="integer", nullable=false)
    */
    private $typeitem;

    /**
    * @var integer
    *
    * @ORM\Column(name="nbVues", type="integer", nullable=false)
    */
    private $nbvues;

    /**
    * @var \DateTime
    *
    * @ORM\Column(name="date", type="date", nullable=false)
    */
    private $date;

    /**
    * @var string
    *
    * @ORM\Column(name="urlCover", type="string", length=255, nullable=true)
    */
    private $urlCover;


    /**
    * @var string
    *
    * @ORM\Column(name="urlPoster", type="string", length=255, nullable=true)
    */
    private $urlPoster;

    /**
    * @var Artiste
    *
    * @ORM\ManyToMany(targetEntity="Artiste", inversedBy="iditem")
    * @ORM\JoinTable(name="itemartiste",
    *   joinColumns={
    *     @ORM\JoinColumn(name="idItem", referencedColumnName="id")
    *   },
    *   inverseJoinColumns={
    *     @ORM\JoinColumn(name="idArtiste", referencedColumnName="id")
    *   }
    * )
    */
    private $idartiste;

    /**
    * @var \Doctrine\Common\Collections\Collection
    *
    * @ORM\ManyToMany(targetEntity="Item", fetch="EXTRA_LAZY")
    * @ORM\JoinTable(name="itemitem",
    *   joinColumns={
    *     @ORM\JoinColumn(name="idItem", referencedColumnName="id")
    *   },
    *   inverseJoinColumns={
    *     @ORM\JoinColumn(name="idAlbum", referencedColumnName="id")
    *   }
    * )
    */
    private $idalbum;

    /**
    * @var \Doctrine\Common\Collections\Collection
    *
    * @ORM\ManyToMany(targetEntity="Playlist", mappedBy="iditem")
    */
    private $idplaylist;

    /**
    * @var \Doctrine\Common\Collections\Collection
    *
    * @ORM\OneToMany(targetEntity="NoteTagItem", mappedBy="iditem", fetch="EXTRA_LAZY")
    *
    */
    private $idtag;

    /**
    * @var \Doctrine\Common\Collections\Collection
    *
    * @ORM\OneToMany(targetEntity="PlaylistItem", mappedBy="iditem")
    *
    */
    private $iditemplaylist;

    /**
    * Constructor
    */
    public function __construct()
    {
        $this->idartiste = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idgenre = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idalbum = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idplaylist = new \Doctrine\Common\Collections\ArrayCollection();
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
    * Set url
    *
    * @param string $url
    * @return Item
    */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
    * Get url
    *
    * @return string
    */
    public function getUrl()
    {
        return $this->url;
    }

    /**
    * Set titre
    *
    * @param string $titre
    * @return Item
    */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
    * Get titre
    *
    * @return string
    */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
    * Set note
    *
    * @param integer $note
    * @return Item
    */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
    * Get note
    *
    * @return integer
    */
    public function getNote()
    {
        return $this->note;
    }

    /**
    * Set duree
    *
    * @param string $duree
    * @return Item
    */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
    * Get duree
    *
    * @return string
    */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
    * Set typeitem
    *
    * @param integer $typeitem
    * @return Item
    */
    public function setTypeitem($typeitem)
    {
        $this->typeitem = $typeitem;

        return $this;
    }

    /**
    * Get typeitem
    *
    * @return integer
    */
    public function getTypeitem()
    {
        return $this->typeitem;
    }

    /**
    * Set nbvues
    *
    * @param integer $nbvues
    * @return Item
    */
    public function setNbvues($nbvues)
    {
        $this->nbvues = $nbvues;

        return $this;
    }

    /**
    * Get nbvues
    *
    * @return integer
    */
    public function getNbvues()
    {
        return $this->nbvues;
    }

    /**
    * Set date
    *
    * @param \DateTime $date
    * @return Item
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
    * Set url cover
    *
    * @param string $url
    * @return Item
    */
    public function setUrlCover($url)
    {
        $this->urlCover = $url;

        return $this;
    }

    /**
    * Get url cover
    *
    * @return string
    */
    public function getUrlCover()
    {
        return $this->urlCover;
    }

    /**
    * Set url poster
    *
    * @param string $url
    * @return Item
    */
    public function setUrlPoster($url)
    {
        $this->urlPoster = $url;

        return $this;
    }

    /**
    * Get url cover
    *
    * @return string
    */
    public function getUrlPoster()
    {
        return $this->urlPoster;
    }

    /**
    * Add idartiste
    *
    * @param \ByExample\DemoBundle\Entity\Artiste $idartiste
    * @return Item
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
    * Add idalbum
    *
    * @param \ByExample\DemoBundle\Entity\Item $idalbum
    * @return Item
    */
    public function addIdalbum(\ByExample\DemoBundle\Entity\Item $idalbum)
    {
        $this->idalbum[] = $idalbum;

        return $this;
    }

    /**
    * Remove idalbum
    *
    * @param \ByExample\DemoBundle\Entity\Item $idalbum
    */
    public function removeIdalbum(\ByExample\DemoBundle\Entity\Item $idalbum)
    {
        $this->idalbum->removeElement($idalbum);
    }

    /**
    * Get idalbum
    *
    * @return \Doctrine\Common\Collections\Collection
    */
    public function getIdalbum()
    {
        return $this->idalbum;
    }

    /**
    * Add idtag
    *
    * @param \ByExample\DemoBundle\Entity\Tag $idtag
    * @return Item
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
    public function removeIdtag(\ByExample\DemoBundle\Entity\Tag $idalbum)
    {
        $this->idalbum->removeElement($idalbum);
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
    * Add idplaylist
    *
    * @param \ByExample\DemoBundle\Entity\Playlist $idplaylist
    * @return Item
    */
    public function addIdplaylist(\ByExample\DemoBundle\Entity\Playlist $idplaylist)
    {
        $this->idplaylist[] = $idplaylist;

        return $this;
    }

    /**
    * Remove idplaylist
    *
    * @param \ByExample\DemoBundle\Entity\Playlist $idplaylist
    */
    public function removeIdplaylist(\ByExample\DemoBundle\Entity\Playlist $idplaylist)
    {
        $this->idplaylist->removeElement($idplaylist);
    }

    /**
    * Get idplaylist
    *
    * @return \Doctrine\Common\Collections\Collection
    */
    public function getIdplaylist()
    {
        return $this->idplaylist;
    }

    /**
    * Add idrecommandation
    *
    * @param \ByExample\RecommandationsBundle\Entity\Recommandation $idrecommandation
    * @return Item
    */
    public function addIdrecommandation(\ByExample\RecommandationsBundle\Entity\Recommandation $idrecommandation)
    {
        $this->idrecommandation[] = $idrecommandation;

        return $this;
    }

    /**
    * Remove idrecommandation
    *
    * @param \ByExample\RecommandationsBundle\Entity\Recommandation $idrecommandation
    */
    public function removeIdrecommandation(\ByExample\RecommandationsBundle\Entity\Recommandation $idrecommandation)
    {
        $this->idrecommandation->removeElement($idrecommandation);
    }

    /**
    * Get idrecommandation
    *
    * @return \Doctrine\Common\Collections\Collection
    */
    public function getIdrecommandation()
    {
        return $this->idrecommandation;
    }

    /**
     * Set youTubeVideoId
     *
     * @param string $youTubeVideoId
     *
     * @return Item
     */
    public function setYouTubeVideoId($youTubeVideoId)
    {
        $this->YouTubeVideoId = $youTubeVideoId;

        return $this;
    }

    /**
     * Get youTubeVideoId
     *
     * @return string
     */
    public function getYouTubeVideoId()
    {
        return $this->YouTubeVideoId;
    }

    /**
     * Add iditemplaylist
     *
     * @param \ByExample\DemoBundle\Entity\PlaylistItem $iditemplaylist
     *
     * @return Item
     */
    public function addIditemplaylist(\ByExample\DemoBundle\Entity\PlaylistItem $iditemplaylist)
    {
        $this->iditemplaylist[] = $iditemplaylist;

        return $this;
    }

    /**
     * Remove iditemplaylist
     *
     * @param \ByExample\DemoBundle\Entity\PlaylistItem $iditemplaylist
     */
    public function removeIditemplaylist(\ByExample\DemoBundle\Entity\PlaylistItem $iditemplaylist)
    {
        $this->iditemplaylist->removeElement($iditemplaylist);
    }

    /**
     * Get iditemplaylist
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIditemplaylist()
    {
        return $this->iditemplaylist;
    }
}
