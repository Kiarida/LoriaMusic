<?php

namespace ByExample\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* Utilisateur
*
* @ORM\Table(name="utilisateur")
* @ORM\Entity(repositoryClass="ByExample\DemoBundle\Repository\UtilisateurRepository")
*/
class Utilisateur
{
    const GENRE_MALE = 1;
    const GENRE_FEMALE = 0;

    /**
    * @var integer
    *
    * @ORM\Column(name="id", type="integer", nullable=false)
    * @ORM\Id
    */
    private $id;

    /**
    * @var \DateTime
    *
    * @ORM\Column(name="dateInscription", type="date", nullable=false)
    */
    private $dateinscription;

    /**
    * @var integer
    *
    * @ORM\Column(name="birthdate", type="date", nullable=false)
    */
    private $birthdate;

    /**
    * @var string
    *
    * @ORM\Column(name="genre", type="boolean", length=1, nullable=false)
    */
    private $genre;

    /**
    * @var string
    *
    * @ORM\Column(name="pays", type="string", length=25, nullable=false)
    */
    private $pays;

    /**
    * @var \Doctrine\Common\Collections\Collection
    *
    * @ORM\ManyToMany(targetEntity="Utilisateur")
    * @ORM\JoinTable(name="utilisateuramis",
    *   joinColumns={
    *     @ORM\JoinColumn(name="idUtilisateur", referencedColumnName="id")
    *   },
    *   inverseJoinColumns={
    *     @ORM\JoinColumn(name="idUtilisateurAmi", referencedColumnName="id")
    *   }
    * )
    */
    private $idutilisateurami;

    /**
    * @var \Doctrine\Common\Collections\Collection
    *
    * @ORM\ManyToMany(targetEntity="ByExample\RecommandationsBundle\Entity\Group", mappedBy="idutilisateur")
    */
    private $idgroup;

    /**
    * @var \Doctrine\Common\Collections\Collection
    *
    * @ORM\OneToMany(targetEntity="ByExample\RecommandationsBundle\Entity\Ordre", mappedBy="idutilisateur")
    *
    */
    private $idordre;

    /**
    * Constructor
    */
    public function __construct()
    {
        $this->idutilisateurami = new \Doctrine\Common\Collections\ArrayCollection();
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
    * Set id
    * @param integer $id
    * @return Utilisateur
    */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
    * Set dateinscription
    *
    * @param \DateTime $dateinscription
    * @return Utilisateur
    */
    public function setDateinscription($dateinscription)
    {
        $this->dateinscription = $dateinscription;
    
        return $this;
    }

    /**
    * Get dateinscription
    *
    * @return \DateTime 
    */
    public function getDateinscription()
    {
        return $this->dateinscription;
    }

    /**
    * Set age
    *
    * @param \DateTime $age
    * @return Utilisateur
    */
    public function setBirthdate($age)
    {
        $this->birthdate = $age;
    
        return $this;
    }

    /**
    * Get age
    *
    * @return \DateTime 
    */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
    * Set genre
    *
    * @param string $genre
    * @return Utilisateur
    */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    
        return $this;
    }

    /**
    * Get genre
    *
    * @return string 
    */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
    * Set pays
    *
    * @param string $pays
    * @return Utilisateur
    */
    public function setPays($pays)
    {
        $this->pays = $pays;
    
        return $this;
    }

    /**
    * Get pays
    *
    * @return string 
    */
    public function getPays()
    {
        return $this->pays;
    }

    /**
    * Add idutilisateurami
    *
    * @param \ByExample\DemoBundle\Entity\Utilisateur $idutilisateurami
    * @return Utilisateur
    */
    public function addIdutilisateurami(\ByExample\DemoBundle\Entity\Utilisateur $idutilisateurami)
    {
        $this->idutilisateurami[] = $idutilisateurami;
    
        return $this;
    }

    /**
    * Remove idutilisateurami
    *
    * @param \ByExample\DemoBundle\Entity\Utilisateur $idutilisateurami
    */
    public function removeIdutilisateurami(\ByExample\DemoBundle\Entity\Utilisateur $idutilisateurami)
    {
        $this->idutilisateurami->removeElement($idutilisateurami);
    }

    /**
    * Get idutilisateurami
    *
    * @return \Doctrine\Common\Collections\Collection 
    */
    public function getIdutilisateurami()
    {
        return $this->idutilisateurami;
    }
}