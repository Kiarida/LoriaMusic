<?php

namespace ByExample\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ByExample\DemoBundle\Entity\Item;
use ByExample\DemoBundle\Entity\Ecoute;
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
class EcouteRestController extends Controller{
   
/**
     * Renvoie les x dernières écoute de l'utilisateur
     * @Get("users/{id}/ecoute")
     * @ApiDoc()
     * @return FOSView
   */

    public function getSessionsAction($id){
        $view = FOSView::create();

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('ByExampleDemoBundle:Ecoute');
        $limit = $this->container->getParameter('ecoutes_return');

        $ecoutes=$repo->findEcoutesByUser($id, $limit);
        if ($ecoutes) {
            $view->setStatusCode(200)->setData($ecoutes);
        } else {
            $view->setStatusCode(404);
        }
        return $view;
    }


    



    /**
    * Créé une écoute
    * @Post("users/{id}/ecoute")
    * @ApiDoc()
    * @return FOSView
   */

  public function addEcouteAction($id){
	$view = FOSView::create();  
    if($this->get('request')->getMethod() == "POST"){


        $idItem = $this->get('request')->request->get('idItem');
        $typeEcoute = $this->get('request')->request->get('typeEcoute');
        $em = $this->getDoctrine()->getManager();

        $item=$em->getRepository('ByExampleDemoBundle:Item')->find($idItem);
        
        if($item){ //si l'item existe
        //trouver la session courante
        $repoSession = $em->getRepository('ByExampleDemoBundle:Session');
        	$session = $repoSession->findCurrentSession($id);
        	if(!$session){//la session n'existe pas, on la créé

        		$session = $repoSession->addSession($id);        	
        	}
        	//on ajoute l'écoute une fois la session crée
        	$repoEcoute = $em->getRepository('ByExampleDemoBundle:Ecoute');
        	$ecoute = $repoEcoute->addEcoute($session, $item, $typeEcoute);
            $repo = $em->getRepository('ByExampleDemoBundle:Item');
            $notes = $repo->updateView($idItem);
        	$view->setStatusCode(200)->setData($ecoute);
        }else{ //l'item n'existe pas
        	$view->setStatusCode(404);
        }

        return $view;

        /*$repoTag=$em->getRepository('ByExampleDemoBundle:Tag');
        $tag=$repoTag->findTagByLibelle($libelle);

        if ($tag) {//si le tag existe deja
            //On regarde s'il y a déjà une association
            $tagsession=$repoSession->findTagSession($tag, $id_session);
            if(!$tagsession){
                //Sinon on la créé
                $tag=$repoSession->insertSessionTag($tag,$id_session);
                if($tag){
                    $view->setStatusCode(200)->setData("Tag associé");
                } else {
                    $view->setStatusCode(402);
                } 
            }        
            else{
                $view->setStatusCode(406);
            }
        }
        else{
            //Si le tag n'existe pas, on va le créer
            $newTag=$repoSession->insertTag($libelle, $id_session);
            if($newTag){
                $view->setStatusCode(200)->setData($newTag->getId());
            } else {
                $view->setStatusCode(408);
            }
        }
    }
    return $view;*/
}
}
}