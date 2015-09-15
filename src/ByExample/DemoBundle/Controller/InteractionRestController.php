<?php

namespace ByExample\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ByExample\DemoBundle\Entity\Item;
use ByExample\DemoBundle\Entity\Interactions;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\View\View AS FOSView;
use ByExample\DemoBundle\Repository\SessionRepository;

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
class InteractionRestController extends Controller{
   
    /**
    * Permet d'enregistrer une interaction liée à une écoute
    * @Post("users/{id}/interaction")
    * @ApiDoc()
    * @return FOSView
   */

  public function addInteractionAction($id){
	$view = FOSView::create();  
    if($this->get('request')->getMethod() == "POST"){

        $idInteraction = $this->get('request')->request->get('idInteraction');
        
        $em = $this->getDoctrine()->getManager();

        $repoInteractions = $em->getRepository('ByExampleDemoBundle:Interactions');
        $repoTypeInter =  $em->getRepository('ByExampleDemoBundle:Typeinteraction');
        $ecoute=$em->getRepository('ByExampleDemoBundle:Ecoute')->findLastEcouteByUser($id);
        $typeInter=$repoTypeInter->find($idInteraction);
        
        if($ecoute && $typeInter){ //si les deux existent
        	$interaction = $repoInteractions->addInteraction($typeInter, $ecoute);
        	$view->setStatusCode(200)->setData($interaction);
        }else{ //l'item n'existe pas
        	$view->setStatusCode(404)->setData($problem);
        }

        return $view;

     
}
}
}