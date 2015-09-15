<?php

namespace ByExample\RecommandationsBundle\Repository;

use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\EntityRepository;
use ByExample\RecommandationsBundle\Entity\Algorithm;
use ByExample\RecommandationsBundle\Entity\Test;
use ByExample\RecommandationsBundle\Entity\Ordre;
use Doctrine\ORM\Query;
use \DateTime;

/**
 * Ordre
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OrdreRepository extends EntityRepository{


    public function createOrder($users, $arrayAlgos, $idtest){
        $repositoryAlgo = $this->_em->getRepository('ByExampleRecommandationsBundle:Algorithm');
        $repositoryUtil = $this->_em->getRepository('ByExampleDemoBundle:Utilisateur');
        $arrays = array();     
       

                
        foreach($users as $user){
             $arrayOrder=$this->prepareOrders(count($arrayAlgos));
           for($i = 0; $i < count($arrayAlgos); $i++)  {
                $random = rand(0, count($arrayAlgos)-$i-1);
                $position = $arrayOrder[$random];
                array_splice($arrayOrder, $random, 1);
               $order = new Ordre();
                $order->setOrdre($position);
                $order->setIdalgorithm($repositoryAlgo->findOneById($arrayAlgos[$i]));
                $order->setIdtest($idtest);
                $order->setIdutilisateur($repositoryUtil->findOneById($user["id"]));
                $this->_em->persist($order);
                $this->_em->flush();
                array_push($arrays, $order->getId());

            }
            
        }
        
        return $arrays;
    }

	public function prepareOrders($length){
        $array = array();
        for($i = 1; $i<=$length; $i++){
            array_push($array, $i);
        }
        return $array;
    }

    




}
