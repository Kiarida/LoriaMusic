<?php

namespace ByExample\RecommandationsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ByExample\DemoBundle\Entity\Utilisateur;

/**
 * Test
 *
 * @ORM\Table(name="test")
 * @ORM\Entity(repositoryClass="ByExample\RecommandationsBundle\Repository\TestRepository")
 */
class Test
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
    * @var \DateTime
    *
    * @ORM\Column(name="dateDebut", type="datetime", nullable=false)
    */
    private $datedebut;

    /**
    * @var \DateTime
    *
    * @ORM\Column(name="dateFin", type="datetime", nullable=true)
    */
    private $datefin;

    /**
    * @var string
    *
    * @ORM\Column(name="label", type="string", length=25, nullable=true)
    */
    private $label;

    /**
    * @var string
    *
    * @ORM\Column(name="mode", type="string", length=25, nullable=true)
    */
    private $mode;

    /**
    * @var integer
    *
    * @ORM\Column(name="groups", type="integer", nullable=false)
    */
    private $groups;

    /**
    * @var \Doctrine\Common\Collections\Collection
    *
    * @ORM\OneToMany(targetEntity="Group", mappedBy="idtest")
    *
    */
    private $idgroup;

    /**
    * @var \Doctrine\Common\Collections\Collection
    *
    * @ORM\OneToMany(targetEntity="Ordre", mappedBy="idtest")
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
     * @return Test
     */
    public function setLabel($label){
        $this->label = $label;
    }

    /**
    * Add idgroup
    *
    * @param \ByExample\RecommandationsBundle\Entity\Group $idgroup
    * @return Test
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
    public function getIdgroup(){
        return $this->idgroup;
    }

    /**
     * Get mode
     *
     * @return string 
     */
    public function getMode(){
        return $this->mode;
    }

    /**
     * Set mode
     *
     * @param string $mode
     * @return Test
     */
    public function setMode($mode){
        $this->mode = $mode;
    }

    /**
     * Get groups
     *
     * @return integer 
     */
    public function getGroups(){
        return $this->groups;
    }

    /**
     * Set groups
     *
     * @param integer $groups
     * @return Test
     */
    public function setGroups($groups){
        $this->groups = $groups;
    }

    /**
     * Set datedebut
     *
     * @param \DateTime $datedebut
     * @return Test
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;
    
        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime 
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     * @return Test
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    
        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime 
     */
    public function getDatefin()
    {
        return $this->datefin;
    }
}