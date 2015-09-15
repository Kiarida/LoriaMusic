<?php

namespace ByExample\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ByExemple\DemoBundle\Entity\Note;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\View\View AS FOSView;
use ByExample\DemoBundle\Repository\NoteRepository;

use FOS\RestBundle\Controller\Annotations\Post;
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
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ODM\PHPCR\Query\QueryException;
use Doctrine\ORM\Query;
use Doctrine\Common\Util\Debug;
/**
 *
 * @Route("/api/notes")
 *@NamePrefix("byexample_notes_")
 */

class NoteRestController extends Controller
{


  /**
  * Retourne la note moyenne d'un artiste
  * @Route("/note/artiste/{idArtiste}")
  * @Method({"GET"})
  * @ApiDoc()
  */
  public function getNoteArtisteAction($idArtiste){
    $view = FOSView::create();

    $em =$this->getDoctrine()->getManager();
    $repo = $em->getRepository('ByExampleDemoBundle:Note');
    $note = $repo-> findNoteByArtiste($idArtiste);
      if ($note) {
              $view->setStatusCode(200)->setData($note);
          } else {
              $view->setStatusCode(404);
          }

    return $view;
    }

  /**
  * Retourne la note moyenne d'un item
  * @Route("/note/item/{idItem}")
  * @Method({"GET"})
  * @ApiDoc()
  */
  public function getNoteItemAction($idItem){
  $view = FOSView::create();

  $em =$this->getDoctrine()->getManager();
  $repo = $em->getRepository('ByExampleDemoBundle:Note');
  $note = $repo-> findNoteByItem($idItem);
      if ($note) {
            $view->setStatusCode(200)->setData($note);
        } else {
            $view->setStatusCode(404);
        }

  return $view;
  }

 }
