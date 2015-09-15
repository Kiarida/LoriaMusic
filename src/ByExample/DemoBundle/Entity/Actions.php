<?php

namespace ByExample\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Actions
 *
 * @ORM\Table(name="actions")
 * @ORM\Entity(repositoryClass="ByExample\DemoBundle\Repository\ActionRepository")
 */
class Actions
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
     * @var \Typeaction
     *
     * @ORM\ManyToOne(targetEntity="Typeaction")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idTypeAction", referencedColumnName="id")
     * })
     */
    private $idtypeaction;

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
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUtilisateur", referencedColumnName="id")
     * })
     */
    private $idutilisateur;

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
     * Set idtypeaction
     *
     * @param \ByExample\DemoBundle\Entity\Typeaction $idtypeaction
     * @return Actions
     */
    public function setIdtypeactions(\ByExample\DemoBundle\Entity\Typeaction $idtypeaction = null)
    {
        $this->idtypeaction = $idtypeaction;
    
        return $this;
    }

    /**
     * Get idtypeaction
     *
     * @return \ByExample\DemoBundle\Entity\Typeaction
     */
    public function getIdtypeaction()
    {
        return $this->idtypeaction;
    }


    /**
     * Set iditem
     *
     * @param \ByExample\DemoBundle\Entity\Item $iditem
     * @return Actions
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


    /**
     * Set idutilisateur
     *
     * @param \ByExample\DemoBundle\Entity\Utilisateur $idutilisateur
     * @return Actions
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