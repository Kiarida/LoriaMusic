<?php

namespace ByExample\RecommandationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ByExample\DemoBundle\Entity\Item;
use ByExample\DemoBundle\Entity\Actions;
use ByExample\RecommandationsBundle\Entity\Algorithm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\View\View AS FOSView;


use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use FOS\RestBundle\Controller\Annotations\Rest;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;                  // @ApiDoc(resource=true, description="Filter",filters={{"name"="a-filter", "dataType"="string", "pattern"="(foo|bar) ASC|DESC"}})
use FOS\RestBundle\Controller\Annotations\NamePrefix;       // NamePrefix Route annotation class @NamePrefix("bdk_core_user_userrest_")
use FOS\RestBundle\View\RouteRedirectView;                  // Route based redirect implementation
use Symfony\Component\Validator\ConstraintViolation;
use JMS\SecurityExtraBundle\Annotation\Secure;
use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use Doctrine\ORM\Query;


/**
 	*@NamePrefix("byexample_algorithm_")
 **/
class AlgorithmController extends Controller{
   

/**
    * Permet de lister les algorithmes
    * @Get("algorithms")
    * @ApiDoc()
    * @return FOSView
   */

  public function getAlgorithmsAction(){
        $view = FOSView::create();    
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('ByExampleRecommandationsBundle:Algorithm');
        $results=$repo->findAllAlgo();
        if($results){ //
          $view->setStatusCode(200)->setData($results);      
        }else{ 
          $view->setStatusCode(404);
        }
        return $view;

 
}

/**
    * Met à jour le label d'un algorithme
    * @PUT("algorithms")
    * @ApiDoc()
    * @return FOSView
   */

  public function updateAlgorithmAction(){
        $view = FOSView::create();    
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('ByExampleRecommandationsBundle:Algorithm');
        $label=$this->get('request')->request->get('label');
        $id=$this->get('request')->request->get('idalgo');
        $color=$this->get('request')->request->get('color');
        $results=$repo->updateAlgo($id, $label,$color);
        if($results){ //
          $view->setStatusCode(200)->setData($results);      
        }else{ 
          $view->setStatusCode(404);
        }
        return $view;

 
  }

}