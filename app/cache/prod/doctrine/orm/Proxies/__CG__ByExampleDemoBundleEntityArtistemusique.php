<?php

namespace Proxies\__CG__\ByExample\DemoBundle\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Artistemusique extends \ByExample\DemoBundle\Entity\Artistemusique implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function setHotttness($hotttness)
    {
        $this->__load();
        return parent::setHotttness($hotttness);
    }

    public function getHotttness()
    {
        $this->__load();
        return parent::getHotttness();
    }

    public function setFamiliarity($familiarity)
    {
        $this->__load();
        return parent::setFamiliarity($familiarity);
    }

    public function getFamiliarity()
    {
        $this->__load();
        return parent::getFamiliarity();
    }

    public function setIdartiste(\ByExample\DemoBundle\Entity\Artiste $idartiste)
    {
        $this->__load();
        return parent::setIdartiste($idartiste);
    }

    public function getIdartiste()
    {
        $this->__load();
        return parent::getIdartiste();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'hotttness', 'familiarity', 'idartiste');
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