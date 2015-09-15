<?php

namespace ByExample\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ByExample\DemoBundle\Entity\Item;
use ByExample\DemoBundle\Entity\Actions;
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
 	*@NamePrefix("byexample_items_")
 **/
class ActionRestController extends Controller{
   
    /**
    * Permet d'enregistrer une action liée à un item
    * @Post("users/{id}/action")
    * @ApiDoc()
    * @return FOSView
   */

  public function addActionAction($id){
	$view = FOSView::create();  
    if($this->get('request')->getMethod() == "POST"){
        $idAction = $this->get('request')->request->get('idAction');
        $idItem = $this->get('request')->request->get('idItem');
        $em = $this->getDoctrine()->getManager();
        $repoAct = $em->getRepository('ByExampleDemoBundle:Actions');
        $repoTypeAct =  $em->getRepository('ByExampleDemoBundle:Typeaction');
        $repoItem = $em->getRepository('ByExampleDemoBundle:Item');
        $item = $repoItem->find($idItem);
        $typeAct=$repoTypeAct->find($idAction);

        if($typeAct && $item){ //si les deux existent
            $action=$repoAct->findAction($idAction, $idItem, $id);  
            //Si l'action existe déjà pour l'item et l'utilisateur, on la supprime
            if($action){
                $conn = $em->getConnection();
                $conn->delete("actions", array("id"=>$action));
                $view->setStatusCode(200);
            }
            else{
                $idAction=$repoAct->addAction($typeAct, $item, $id);
                $view->setStatusCode(200)->setData($idAction);
            }
        	
        }else{ //l'item n'existe pas
        	$view->setStatusCode(404);
        }

        return $view;

     
        }
    }



    /**
    * Permet de récupérer les actions sur un item
    * @Get("users/{id}/actions/{iditem}")
    * @ApiDoc()
    * @return FOSView
   */

  public function getActionsAction($id, $iditem){
    $view = FOSView::create();  
    if($this->get('request')->getMethod() == "GET"){

        $em = $this->getDoctrine()->getManager();
        $repoAct = $em->getRepository('ByExampleDemoBundle:Actions');

        $types = $repoAct->getTypesActions($iditem, $id);
        if($types){ //s'il y a une action sur l'item
            $view->setStatusCode(200)->setData($types);
            
        }else{ 
            $view->setStatusCode(404);
        }

        return $view;

     
    }
}

}