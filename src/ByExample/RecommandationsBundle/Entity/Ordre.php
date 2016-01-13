<?php

namespace ByExample\RecommandationsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ByExample\DemoBundle\Entity\Utilisateur;

/**
* Ordre
*
* @ORM\Table(name="ordre")
* @ORM\Entity(repositoryClass="ByExample\RecommandationsBundle\Repository\OrdreRepository")
*/
class Ordre
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
    * @var integer
    *
    * @ORM\Column(name="ordre", type="integer", nullable=false)
    */
    private $ordre;

    /**
    * @var \Doctrine\Common\Collections\Collection
    *
    * @ORM\ManyToOne(targetEntity="Algorithm", inversedBy="idordre")
    * @ORM\JoinColumn(name="idAlgorithm", referencedColumnName="id")
    */
    private $idalgorithm;

    /**
    * @var \Doctrine\Common\Collections\Collection
    *
    * @ORM\ManyToOne(targetEntity="Test", inversedBy="idordre")
    * @ORM\JoinColumn(name="idTest", referencedColumnName="id")
    */
    private $idtest;

    /**
    * @var \Doctrine\Common\Collections\Collection
    *
    * @ORM\ManyToOne(targetEntity="ByExample\DemoBundle\Entity\Utilisateur", inversedBy="idordre")
    * @ORM\JoinColumn(name="idUtilisateur", referencedColumnName="id")
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
    * Get ordre
    *
    * @return integer 
    */
    public function getOrdre(){
        return $this->ordre;
    }

    /**
    * Set ordre
    *
    * @param integer $ordre
    * @return Ordre
    */
    public function setOrdre($ordre){
        $this->ordre = $ordre;
    }

    /**
    * Set idtest
    *
    * @param \ByExample\RecommandationsBundle\Entity\Test $idtest
    * @return Group
    */
    public function setIdtest(\ByExample\RecommandationsBundle\Entity\Test $idtest = null)
    {
        $this->idtest = $idtest;
    
        return $this;
    }

    /**
    * Get idtest
    *
    * @return \Test
    */
    public function getIdtest()
    {
        return $this->idtest;
    }

    /**
    * Set idutilisateur
    *
    * @param \ByExample\DemoBundle\Entity\Utilisateur $idutilisateur
    * @return Ordre
    */
    public function setIdutilisateur(\ByExample\DemoBundle\Entity\Utilisateur $idutilisateur = null)
    {
        $this->idutilisateur = $idutilisateur;
    
        return $this;
    }

    /**
    * Get idutilisateur
    *
    * @return \Ordre
    */
    public function getIdutilisateur()
    {
        return $this->idutilisateur;
    }

    /**
    * Set idalgorithm
    *
    * @param \Algorithm $idalgorithm
    * @return Ordre
    */
    public function setIdalgorithm(Algorithm $idalgorithm = null)
    {
        $this->idalgorithm = $idalgorithm;
    
        return $this;
    }

    /**
    * Get idalgorithm
    *
    * @return \Ordre
    */
    public function getIdalgorithm()
    {
        return $this->idalgorithm;
    }
}