<?php

namespace ByExample\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ByExample\DemoBundle\Entity\Item;
use ByExample\DemoBundle\Entity\Session;
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
    *@Route("users/{id}/")
 **/
class SessionRestController extends Controller{
    /**
     * Retourne la liste de tous les items écoutés lors d'une session
     * @Get("sessions/{id_session}")
     * @ApiDoc()
     * @return FOSView
   */

    public function getItemsBySessionAction($id_session){
        $view = FOSView::create();

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('ByExampleDemoBundle:Session');
        $items=$repo->findItemsBySessionId($id_session);
        if ($items) {
            $view->setStatusCode(200)->setData($items);
        } else {
            $view->setStatusCode(404);
        }
        return $view;
    }

    /**
     * Renvoie les x dernières sessions d'écoute de l'utilisateur
     * @Get("sessions")
     * @ApiDoc()
     * @return FOSView
   */

    public function getSessionsAction($id){
        $view = FOSView::create();

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('ByExampleDemoBundle:Session');
        $limit = $this->container->getParameter('sessions_return');

        $sessions=$repo->findSessionsByUser($id, $limit);
        if ($sessions) {
            $view->setStatusCode(200)->setData($sessions);
        } else {
            $view->setStatusCode(404);
        }
        return $view;
    }

        /**
     * Retourne tous les tags liés à la session en paramètre
     * @Get("sessions/{id_session}/tags")
     * @ApiDoc()
     * @return FOSView
   */

    public function getTagsBySessionAction($id_session){
        $view = FOSView::create();

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('ByExampleDemoBundle:Session');
        $items=$repo->findTagsBySessionId($id_session);
        if ($items) {
            $view->setStatusCode(200)->setData($items);
        } else {
            $view->setStatusCode(404);
        }
        return $view;
    }


     /**
    * Ajoute un tag à une session
    * @Post("sessions/{id_session}/tags")
    * @ApiDoc()
    * @return FOSView
   */

  public function addSessionTagAction($id, $id_session){
$view = FOSView::create();  
    if($this->get('request')->getMethod() == "POST"){


        $libelle = $this->get('request')->request->get('libelle');
        $em = $this->getDoctrine()->getManager();

        $repoSession=$em->getRepository('ByExampleDemoBundle:Session');

        $repoTag=$em->getRepository('ByExampleDemoBundle:Tag');
        $tag=$repoTag->findTagByLibelle($libelle);

        if ($tag) {//si le tag existe deja
            //On regarde s'il y a déjà une association
            $tagsession=$repoSession->findTagSession($tag, $id_session);
            if(!$tagsession){
                //Sinon on la créé
                $tag=$repoSession->insertSessionTag($tag,$id_session);
                if($tag){
                    $view->setStatusCode(200)->setData($tags[0]);
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
                $view->setStatusCode(200)->setData($newTag);
            } else {
                $view->setStatusCode(408);
            }
        }
    }
    return $view;
}

/**
    * Supprime une association entre un tag et une session
    * @Delete("sessions/{id_session}/tags/{idTag}")
    * @ApiDoc()
    * @return FOSView
   */

    public function deleteSessionTagAction($id_session, $idTag){
        $view = FOSView::create();

        $em = $this->getDoctrine()->getManager();
        $repo=$em->getRepository('ByExampleDemoBundle:Tag');
        $tags=$repo->findTagById($idTag);
        if($tags){
            $conn = $em->getConnection();
            $conn->delete("tagsession", array("idTag"=>$idTag));
            $view->setStatusCode(200);
        }
        return $view;
    }


    /**
    * Termine une session 
    * @Put("session/end")
    * @ApiDoc()
    * @return FOSView
    */
    public function getLastEcouteAction($id){
        $view = FOSView::create();

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('ByExampleDemoBundle:Session');
        $ecoutes = $repo->closeSession($id, false);
        if ($ecoutes) {
            $view->setStatusCode(200)->setData($ecoutes);
        } else {
            $view->setStatusCode(404);
        }
        return $view;
    }

}