<?php

namespace ByExample\RecommandationsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ByExample\DemoBundle\Entity\Utilisateur;

/**
 * Algorithm
 *
 * @ORM\Table(name="algorithm")
 * @ORM\Entity(repositoryClass="ByExample\RecommandationsBundle\Repository\AlgorithmRepository")
 */
class Algorithm
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
     * @var color
     *
     * @ORM\Column(name="color", type="string", length=25, nullable=true)
     */
    private $color;


     /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=25, nullable=true)
     */
    private $label;

     /**
     * @var boolean
     *
     * @ORM\Column(name="precalculated", type="boolean", nullable=false)
     */
    private $precalculated;


     /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ByExample\RecommandationsBundle\Entity\Group", mappedBy="idalgorithm")
     */
    private $idgroup;


      /**
      * @var \Doctrine\Common\Collections\Collection
      *
      * @ORM\OneToMany(targetEntity="Ordre", mappedBy="idalgorithm")
      *
      */
      private $idordre;

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
     * Get nom
     *
     * @return string 
     */
    public function getNom(){
        return $this->nom;
    }


    /**
     * Set nom
     *
     * @param string $nom
     * @return Algorithm
     */
    public function setNom($nom){
        $this->nom = $nom;
    }

    /**
     * Get label
     *
     * @return string 
     */
    public function getLabel(){
        return $this->label;
    }


    /**
     * Set label
     *
     * @param string $label
     * @return Algorithm
     */
    public function setLabel($label){
        $this->label = $label;
    }


      /**
     * Get color
     *
     * @return string 
     */
    public function getColor(){
        return $this->color;
    }


    /**
     * Set color
     *
     * @param string $color
     * @return Algorithm
     */
    public function setColor($color){
        $this->color = $color;
    }

    /**
     * Get precalculated
     *
     * @return boolean 
     */
    public function getPrecalculated(){
        return $this->precalculated;
    }


      /**
     * Set precalculated
     *
     * @param boolean $precalculated
     * @return Algorithm
     */
    public function setPrecalculated($precalculated){
        $this->precalculated = $precalculated;
    }

     /**
     * Add idgroup
     *
     * @param \ByExample\RecommandationsBundle\Entity\Group $idgroup
     * @return Group
     */
    public function addIdgroup(\ByExample\RecommandationsBundle\Entity\Group $idgroup)
    {
        $this->idgroup[] = $idgroup;

        return $this;
    }

    /**
     * Remove idgroup
     *
     * @param \ByExample\RecommandationsBundle\Entity\Group $idgroup
     */
    public function removeIdgroup(\ByExample\RecommandationsBundle\Entity\Group $idgroup)
    {
        $this->idgroup->removeElement($idgroup);
    }

    /**
     * Get idgroup
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdgroup()
    {
        return $this->idgroup;
    }


    
}