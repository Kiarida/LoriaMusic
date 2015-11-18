<?php

namespace Proxies\__CG__\ByExample\DemoBundle\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Item extends \ByExample\DemoBundle\Entity\Item implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setUrl($url)
    {
        $this->__load();
        return parent::setUrl($url);
    }

    public function getUrl()
    {
        $this->__load();
        return parent::getUrl();
    }

    public function setTitre($titre)
    {
        $this->__load();
        return parent::setTitre($titre);
    }

    public function getTitre()
    {
        $this->__load();
        return parent::getTitre();
    }

    public function setNote($note)
    {
        $this->__load();
        return parent::setNote($note);
    }

    public function getNote()
    {
        $this->__load();
        return parent::getNote();
    }

    public function setDuree($duree)
    {
        $this->__load();
        return parent::setDuree($duree);
    }

    public function getDuree()
    {
        $this->__load();
        return parent::getDuree();
    }

    public function setTypeitem($typeitem)
    {
        $this->__load();
        return parent::setTypeitem($typeitem);
    }

    public function getTypeitem()
    {
        $this->__load();
        return parent::getTypeitem();
    }

    public function setNbvues($nbvues)
    {
        $this->__load();
        return parent::setNbvues($nbvues);
    }

    public function getNbvues()
    {
        $this->__load();
        return parent::getNbvues();
    }

    public function setDate($date)
    {
        $this->__load();
        return parent::setDate($date);
    }

    public function getDate()
    {
        $this->__load();
        return parent::getDate();
    }

    public function setUrlCover($url)
    {
        $this->__load();
        return parent::setUrlCover($url);
    }

    public function getUrlCover()
    {
        $this->__load();
        return parent::getUrlCover();
    }

    public function setUrlPoster($url)
    {
        $this->__load();
        return parent::setUrlPoster($url);
    }

    public function getUrlPoster()
    {
        $this->__load();
        return parent::getUrlPoster();
    }

    public function addIdartiste(\ByExample\DemoBundle\Entity\Artiste $idartiste)
    {
        $this->__load();
        return parent::addIdartiste($idartiste);
    }

    public function removeIdartiste(\ByExample\DemoBundle\Entity\Artiste $idartiste)
    {
        $this->__load();
        return parent::removeIdartiste($idartiste);
    }

    public function getIdartiste()
    {
        $this->__load();
        return parent::getIdartiste();
    }

    public function addIdalbum(\ByExample\DemoBundle\Entity\Item $idalbum)
    {
        $this->__load();
        return parent::addIdalbum($idalbum);
    }

    public function removeIdalbum(\ByExample\DemoBundle\Entity\Item $idalbum)
    {
        $this->__load();
        return parent::removeIdalbum($idalbum);
    }

    public function getIdalbum()
    {
        $this->__load();
        return parent::getIdalbum();
    }

    public function addIdtag(\ByExample\DemoBundle\Entity\Tag $idtag)
    {
        $this->__load();
        return parent::addIdtag($idtag);
    }

    public function removeIdtag(\ByExample\DemoBundle\Entity\Tag $idalbum)
    {
        $this->__load();
        return parent::removeIdtag($idalbum);
    }

    public function getIdtag()
    {
        $this->__load();
        return parent::getIdtag();
    }

    public function addIdplaylist(\ByExample\DemoBundle\Entity\Playlist $idplaylist)
    {
        $this->__load();
        return parent::addIdplaylist($idplaylist);
    }

    public function removeIdplaylist(\ByExample\DemoBundle\Entity\Playlist $idplaylist)
    {
        $this->__load();
        return parent::removeIdplaylist($idplaylist);
    }

    public function getIdplaylist()
    {
        $this->__load();
        return parent::getIdplaylist();
    }

    public function addIdrecommandation(\ByExample\RecommandationsBundle\Entity\Recommandation $idrecommandation)
    {
        $this->__load();
        return parent::addIdrecommandation($idrecommandation);
    }

    public function removeIdrecommandation(\ByExample\RecommandationsBundle\Entity\Recommandation $idrecommandation)
    {
        $this->__load();
        return parent::removeIdrecommandation($idrecommandation);
    }

    public function getIdrecommandation()
    {
        $this->__load();
        return parent::getIdrecommandation();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'url', 'titre', 'note', 'duree', 'typeitem', 'nbvues', 'date', 'urlCover', 'urlPoster', 'idartiste', 'idalbum', 'idplaylist', 'idtag', 'iditemplaylist');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields as $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}