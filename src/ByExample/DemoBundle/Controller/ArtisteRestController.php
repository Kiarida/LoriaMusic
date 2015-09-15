<?php

namespace ByExample\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ByExemple\DemoBundle\Entity\Artiste;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\View\View AS FOSView;
use ByExample\DemoBundle\Repository\ArtisteRepository;


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


/**
 * 
 * @Route("/artistes")
 *@NamePrefix("byexample_artistes_")
 */

class ArtisteRestController extends Controller
{
	/**
  * Renvoie les informations sur un artiste
     * @Method({"GET"})
     * @ApiDoc()
   */
  public function getArtisteAction($id){
  $view = FOSView::create();
		
  $artiste = $this->getDoctrine()->getRepository('ByExampleDemoBundle:Artiste')->findArtist($id);
    if ($artiste) {
            $view->setStatusCode(200)->setData($artiste);
        } else {
            $view->setStatusCode(404);
        }

        return $view;
  }

/**
  * Liste de x artistes aléatoires
  * @Method({"GET"})
  * @ApiDoc()
  */


  public function getArtistesAction(){
    $view = FOSView::create();

    $limit = $this->container->getParameter('artistes_return');

  	$artistes = $this->getDoctrine()->getRepository('ByExampleDemoBundle:Artiste')->findArtistes($limit);
  	if ($artistes) {
              $view->setStatusCode(200)->setData($artistes);
          } else {
              $view->setStatusCode(404);
          }

    return $view;
  
 }

/**
* Recherche des artistes de la base en fonction du mot clé donné en paramètre
* @Route("/artistes/search/{keyword}")
     * @Method({"GET"})
     * @ApiDoc()
   */

  public function getArtistesSearchAction($keyword){
    $view = FOSView::create();
    
    $em = $this->getDoctrine()->getManager();
    $repo = $em->getRepository('ByExampleDemoBundle:Artiste');
    $artistes = $repo->findArtistesBySearchKey($keyword);

    if ($artistes) {
              $view->setStatusCode(200)->setData($artistes);
          } else {
              $view->setStatusCode(404);
          }

          return $view;
    
   }

}