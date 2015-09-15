<?php

namespace ByExample\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ByExample\DemoBundle\Entity\Playlist;
use ByExample\DemoBundle\Entity\Tag;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\View\View AS FOSView;
use ByExample\DemoBundle\Repository\PlaylistRepository;

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
class PlaylistRestController extends Controller{
    /**
     * Retourne tous les détails d'une playlist
     * @Get("users/{id}/playlist/{id_playlist}")
     * @ApiDoc()
     * @return FOSView
   */

    public function getPlaylistsAction($id, $id_playlist){
        $view = FOSView::create();

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('ByExampleDemoBundle:Playlist');
        $playlists=$repo->findPlaylistById($id, $id_playlist);
        
        if ($playlists) {
            $view->setStatusCode(200)->setData($playlists);
        } else {
            $view->setStatusCode(404);
        }
        return $view;
    }

    /**
    * Retourne la liste des tags liés à une playlist
     * @Get("users/{id}/playlists/{id_playlist}/tags")
     * @ApiDoc()
     * @return FOSView
   */
    public function getPlaylistTagsAction($id, $id_playlist){
        $view = FOSView::create();
        $em = $this->getDoctrine()->getManager();
        $repo=$em->getRepository('ByExampleDemoBundle:Tag');
        $tags=$repo->findTagByIdPlay($id_playlist);
        if ($tags) {
            $view->setStatusCode(200)->setData($tags);
        } else {
            $view->setStatusCode(404);
        }
        return $view;

    }

    /**
    * Associe un tag a une playlist ou créé un nouveau tag
    * @Post("users/{id}/playlists/{id_playlist}/tags")
    * @ApiDoc()
    * @return FOSView
   */

  public function getPlaylistTagAction($id, $id_playlist){
    $view = FOSView::create();  
    if($this->get('request')->getMethod() == "POST"){
      //$word="%".$libelle."%";
        $libelle = $this->get('request')->request->get('libelle');
        $em = $this->getDoctrine()->getManager();
        $repoPlaylist=$em->getRepository('ByExampleDemoBundle:Playlist');
        $repoTag=$em->getRepository('ByExampleDemoBundle:Tag');
        $tags=$repoTag->findTagByLibelle($libelle);
        if ($tags) {
            //On regarde s'il y a déjà une association
            $tagplaylist=$repoPlaylist->findPlaylistByTag($tags, $id_playlist);
            if(!$tagplaylist){
                //Sinon on la créé
                $tag=$repoPlaylist->insertPlaylistTag($tags,$id_playlist);
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
            $newTag=$repoPlaylist->insertTag($libelle, $id_playlist);
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
    * Supprime une association entre un tag et une playlist
    * @Delete("users/{id}/playlists/{id_playlist}/tags/{idtag}")
    * @ApiDoc()
    * @return FOSView
   */

    public function deletePlaylistTagAction($id, $id_playlist,$idtag){
        $view = FOSView::create();
        if($this->get('request')->getMethod() == "DELETE"){
            $em = $this->getDoctrine()->getManager();
            $conn = $em->getConnection();
            $conn->delete("tagplaylist", array("idTag"=>$idtag, "idPlaylist"=>$id_playlist));
            $view->setStatusCode(200);
        }
        return $view;
    }

     /**
     * Supprime une playlist
    * @Delete("users/{id}/playlist/{id_playlist}")
    * @ApiDoc()
    * @return FOSView
   */

    public function deletePlaylistAction($id, $id_playlist){
        $view = FOSView::create();

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('ByExampleDemoBundle:Playlist');
        $playlists=$repo->findPlaylistById($id, $id_playlist);
        if($playlists){
            $conn = $em->getConnection();
            $conn->delete("playlist", array("id"=>$id_playlist));
            $view->setStatusCode(200);
        }
        return $view;
    }


    /**
     * Ajoute un item à une playlist
    * @POST("users/{id}/playlist/{id_playlist}/items")
    * @ApiDoc()
    * @return FOSView
   */
    public function postPlaylistItemAction($id, $id_playlist){
        $view = FOSView::create();  
        if($this->get('request')->getMethod() == "POST"){
            $iditem = $this->get('request')->request->get('iditem');
            $em = $this->getDoctrine()->getManager();
            $repoPlaylist=$em->getRepository('ByExampleDemoBundle:Playlist');
            $index=$repoPlaylist->countItem($id_playlist);
            $repoItem=$em->getRepository('ByExampleDemoBundle:Item');
            $item=$repoItem->findOneById($iditem);
            if ($item) {
                $insert=$em->getConnection()->insert("itemplaylist", array("idItem"=>$iditem, "idPlaylist"=>$id_playlist, "position"=>$index));
                    if($insert){
                        $view->setStatusCode(200)->setData($insert);
                    } else {
                        $view->setStatusCode(402);
                    } 
            }        
            else{
                $view->setStatusCode(406);
            }
        }
        return $view;
    }

    /**
     * Supprime un item d'une playlist
    * @DELETE("users/{id}/playlist/{id_playlist}/items/{iditem}")
    * @ApiDoc()
    * @return FOSView
   */
    public function deletePlaylistItemAction($id, $id_playlist, $iditem){
        $view = FOSView::create();  
        if($this->get('request')->getMethod() == "DELETE"){
            $em = $this->getDoctrine()->getManager();
            $em->getConnection()->delete("itemplaylist", array("idItem"=>$iditem, "idPlaylist"=>$id_playlist));
        }
        return $view;
     }

     /**
     *Met à jour la position d'un item dans une playlist
    * @Put("users/{id}/playlist/{id_playlist}/items")
    * @ApiDoc()
    * @return FOSView
   */
     public function updateIndexItemAction($id, $id_playlist){
        $view = FOSView::create();  
        $iditem = $this->get('request')->request->get('iditemGrab');
        $position = $this->get('request')->request->get('indexGrab');
        $iditem2 = $this->get('request')->request->get('iditemMov');
        $position2 = $this->get('request')->request->get('indexMov');
        $em = $this->getDoctrine()->getManager();
        $repoPlaylist=$em->getRepository('ByExampleDemoBundle:Playlist');
        $repoItem=$em->getRepository('ByExampleDemoBundle:Item');
        $item=$repoItem->findOneById($iditem);

        if($item){
            $oldItem=$repoPlaylist->updatePosition($id_playlist, $iditem, $position, $iditem2, $position2);
            if($oldItem){
                $view->setStatusCode(200)->setData("Success");
            }
            
        } else {
            $view->setStatusCode(408);
        }
        return $view;
     }



}