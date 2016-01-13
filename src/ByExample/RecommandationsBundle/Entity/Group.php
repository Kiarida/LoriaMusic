<?php

namespace ByExample\RecommandationsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ByExample\DemoBundle\Entity\Utilisateur;

/**
 * Group
 *
 * @ORM\Table(name="groupe")
 * @ORM\Entity(repositoryClass="ByExample\RecommandationsBundle\Repository\GroupRepository")
 */
class Group
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
    * @var ByExample\DemoBundle\Entity\Utilisateur
    *
    * @ORM\ManyToMany(targetEntity="ByExample\DemoBundle\Entity\Utilisateur", inversedBy="idgroup")
    * @ORM\JoinTable(name="groupeutilisateur",
    *   joinColumns={
    *     @ORM\JoinColumn(name="idGroupe", referencedColumnName="id")
    *   },
    *   inverseJoinColumns={
    *     @ORM\JoinColumn(name="idUtilisateur", referencedColumnName="id")
    *   }
    * )
    */
    private $idutilisateur;

    /**
    * @var integer
    *
    * @ORM\Column(name="numero", type="string", length=25, nullable=false)
    */
    private $numero;

     /**
     * @var \Test
     *
     * @ORM\ManyToOne(targetEntity="Test", inversedBy="idgroup", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idTest", referencedColumnName="id")
     * })
     */
    private $idtest;

    /**
     * @var ByExample\RecommandationsBundle\Entity\Algorithm
     *
     * @ORM\ManyToMany(targetEntity="ByExample\RecommandationsBundle\Entity\Algorithm", inversedBy="idgroup")
     * @ORM\JoinTable(name="groupealgo",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idGroupe", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idAlgorithme", referencedColumnName="id")
     *   }
     * )
     */
    private $idalgorithm;


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
     * Set numero
     *
     * @param string $numero
     * @return Group
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }
    /**
     * Get numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

     /**
     * Add idalgorithm
     *
     * @param \ByExample\RecommandationsBundle\Entity\Algorithm $idalgorithm
     * @return Group
     */
    public function addIdalgorithm(\ByExample\RecommandationsBundle\Entity\Algorithm $idalgorithm)
    {
        $this->idalgorithm[] = $idalgorithm;

        return $this;
    }

    /**
     * Remove idalgorithm
     *
     * @param \ByExample\RecommandationsBundle\Entity\Algorithm $idalgorithm
     */
    public function removeIdalgorithm(\ByExample\RecommandationsBundle\Entity\Algorithm $idalgorithm)
    {
        $this->idalgorithm->removeElement($idalgorithm);
    }

    /**
     * Get idalgorithm
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdalgorithm()
    {
        return $this->idalgorithm;
    }

        /**
     * Add idutilisateur
     *
     * @param \ByExample\DemoBundle\Entity\Utilisateur $idutilisateur
     * @return Utilisateur
     */
    public function addIdutilisateur(\ByExample\DemoBundle\Entity\Utilisateur $idutilisateur)
    {
        $this->idutilisateur[] = $idutilisateur;
    
        return $this;
    }

    /**
     * Remove idutilisateur
     *
     * @param \ByExample\DemoBundle\Entity\Utilisateur $idutilisateur
     */
    public function removeIdutilisateur(\ByExample\DemoBundle\Entity\Utilisateur $idutilisateur)
    {
        $this->idutilisateur->removeElement($idutilisateur);
    }

    /**
     * Get idutilisateur
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdutilisateur()
    {
        return $this->idutilisateur;
    }



}