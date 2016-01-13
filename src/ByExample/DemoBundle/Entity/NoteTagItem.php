<?php
namespace ByExample\DemoBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Tag
 *
 * @ORM\Table(name="notetagitem")
 * @ORM\Entity
 */
class NoteTagItem
{
    /**
     * @var decimal
     *
     * @ORM\Column(name="note", type="decimal", precision=5, scale=2, nullable=false)
     */
    private $note;
    
    /**
    * @var \Doctrine\Common\Collections\Collection
    *
    * @ORM\Id @ORM\ManyToOne(targetEntity="Item", inversedBy="idtag")
    * @ORM\JoinColumn(name="idItem", referencedColumnName="id")
    */
    private $iditem;
    
    /**
    * @var \Doctrine\Common\Collections\Collection
    *
    * @ORM\Id @ORM\ManyToOne(targetEntity="Tag", inversedBy="idnotetagitem")
    * @ORM\JoinColumn(name="idTag", referencedColumnName="id")
    */
    private $idtag;

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
    * Set note
    *
    * @param string $note
    * @return NoteTagItem
    */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
    * Get note
    *
    * @return string
    */
    public function getNote()
    {
        return $this->note;
    }

    /**
    * Set iditem
    *
    * @param string $iditem
    * @return NoteTagItem
    */
    public function setIditem($iditem)
    {
        $this->iditem = $iditem;

        return $this;
    }

    /**
    * Set idtag
    *
    * @param string $idtag
    * @return NoteTagItem
    */
    public function setIdtag($idtag)
    {
        $this->idtag = $idtag;

        return $this;
    }
}