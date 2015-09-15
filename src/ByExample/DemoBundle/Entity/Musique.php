<?php

namespace ByExample\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Musique
 *
 * @ORM\Table(name="musique")
 * @ORM\Entity(repositoryClass="ByExample\DemoBundle\Repository\MusiqueRepository")
 */
class Musique
{
    /**
     * @var float
     *
     * @ORM\Column(name="tempo", type="float", precision=5, scale=3, nullable=false)
     */
    private $tempo;

    /**
     * @var integer
     *
     * @ORM\Column(name="mode", type="integer", nullable=false)
     */
    private $mode;

    /**
     * @var decimal
     *
     * @ORM\Column(name="loudness", type="decimal", precision=5, scale=2, nullable=false)
     */
    private $loudness;

    /**
     * @var decimal
     *
     * @ORM\Column(name="energy", type="decimal", precision=5, scale=6, nullable=false)
     */
    private $energy;

    /**
     * @var decimal
     *
     * @ORM\Column(name="hotttness", type="decimal", precision=5, scale=6, nullable=false)
     */
    private $hotttness;

    /**
     * @var decimal
     *
     * @ORM\Column(name="danceability", type="decimal", precision=5, scale=6, nullable=false)
     */
    private $danceability;

    /**
     * @var \Item
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idItem", referencedColumnName="id")
     * })
     */
    private $iditem;



    /**
     * Set tempo
     *
     * @param float $tempo
     * @return Musique
     */
    public function setTempo($tempo)
    {
        $this->tempo = $tempo;

        return $this;
    }

    /**
     * Get tempo
     *
     * @return float
     */
    public function getTempo()
    {
        return $this->tempo;
    }

    /**
     * Set mode
     *
     * @param integer $mode
     * @return Musique
     */
    public function setMode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * Get mode
     *
     * @return integer
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Set loudness
     *
     * @param decimal $loudness
     * @return Musique
     */
    public function setLoudness($loudness)
    {
        $this->loudness = $loudness;

        return $this;
    }

    /**
     * Get loudness
     *
     * @return decimal
     */
    public function getLoudness()
    {
        return $this->loudness;
    }

    /**
     * Set energy
     *
     * @param decimal $energy
     * @return Musique
     */
    public function setEnergy($energy)
    {
        $this->energy = $energy;

        return $this;
    }

    /**
     * Get energy
     *
     * @return decimal
     */
    public function getEnergy()
    {
        return $this->energy;
    }

    /**
     * Set hotttness
     *
     * @param decimal $hotttness
     * @return Musique
     */
    public function setHotttness($hotttness)
    {
        $this->hotttness = $hotttness;

        return $this;
    }

    /**
     * Get hotttness
     *
     * @return decimal
     */
    public function getHotttness()
    {
        return $this->hotttness;
    }

    /**
     * Set danceability
     *
     * @param decimal $danceability
     * @return Musique
     */
    public function setDanceability($danceability)
    {
        $this->danceability = $danceability;

        return $this;
    }

    /**
     * Get danceability
     *
     * @return decimal
     */
    public function getDanceability()
    {
        return $this->danceability;
    }

    /**
     * Set iditem
     *
     * @param \ByExample\DemoBundle\Entity\Item $iditem
     * @return Musique
     */
    public function setIditem(\ByExample\DemoBundle\Entity\Item $iditem)
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
