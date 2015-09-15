<?php 

namespace ByExample\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ByExemple\DemoBundle\Entity\Genre;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\View\View AS FOSView;
use ByExample\DemoBundle\Repository\GenreRepository;

use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Get;
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


/**
 * 
 * @Route("/genres")
 *@NamePrefix("byexample_genres_")
 */

class GenreRestController extends Controller
{

  /**
  * Renvoie la liste de tous les genres
  * @Method({"GET"})
  * @ApiDoc()
  */
  public function getGenresAction(){
    $view = FOSView::create();
  	$genres = $this->getDoctrine()->getRepository('ByExampleDemoBundle:Genre')->findAll();
  	if ($genres) {
      $view->setStatusCode(200)->setData($genres);
    } else {
      $view->setStatusCode(404);
    }

    return $view;
  }

  /**
  * Recherche un genre selon un mot-clé
  * @Get("genres/{key}")
  * @ApiDoc()
  */
  public function getSearchGenresAction($key){
    $view = FOSView::create();
    $genres = $this->getDoctrine()->getRepository('ByExampleDemoBundle:Genre')->findGenreByKey($key);
    if ($genres) {
      $view->setStatusCode(200)->setData($genres);
    } else {
      $view->setStatusCode(404);
    }

    return $view;
  }

}
