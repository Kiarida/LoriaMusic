<?php
namespace ByExample\DemoBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * PlaylistItem
 *
 * @ORM\Table(name="itemplaylist")
 * @ORM\Entity
 */
class PlaylistItem
{

    /**
     * @var decimal
     *
     * @ORM\Column(name="position", type="integer", nullable=false)
     */
    private $position;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\Id @ORM\ManyToOne(targetEntity="Item")
     * @ORM\JoinColumn(name="idItem", referencedColumnName="id")
     **/
    private $iditem;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\Id @ORM\ManyToOne(targetEntity="Playlist")
     * @ORM\JoinColumn(name="idPlaylist", referencedColumnName="id")
     **/
    private $idplaylist;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->iditem = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idplaylist = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set note
     *
     * @param string $note
     * @return NoteTagItem
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }
    /**
     * Get note
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

}
