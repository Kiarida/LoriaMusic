<?php

namespace ByExample\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ByExample\DemoBundle\Entity\Item;
use ByExample\DemoBundle\Entity\Tag;
use ByExample\DemoBundle\Entity\Xboxmusic;
use ByExample\DemoBundle\Entity\gsAPI;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\View\View AS FOSView;
use ByExample\DemoBundle\Repository\ItemRepository;
use ByExample\DemoBundle\Repository\MusiqueRepository;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Route;
use FOS\RestBundle\Controller\Annotations\Put;
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
use Symfony\Component\HttpFoundation\Session\Session;
use \DateTime;
use Madcoda\Youtube;

/**
 *
 * @Route("/api/items")
 *@NamePrefix("byexample_items_")
 */

class ItemRestController extends Controller
{
	/**
  * Renvoie le détail d'un item
  * @Method({"GET"})
  * @ApiDoc()
  */
  public function getItemAction($id){
  $view = FOSView::create();

    $item = $this->getDoctrine()->getRepository('ByExampleDemoBundle:Item')->find($id);
/*  $itemT = new Item();
  $itemT->setId($item->getId());*/

    if ($item) {
            $view->setStatusCode(200)->setData($item);
        } else {
            $view->setStatusCode(404);
        }

        return $view;
  }

  /**
  * Recherche des items dans la base en fonction du mot clé donné en paramètre
  * @Route("/items/search/{key}")
  * @Method({"GET"})
  * @ApiDoc()
  */
  public function getItemsSearchAction($key){
    $view = FOSView::create();

    $em = $this->getDoctrine()->getManager();
    
    $repo = $em->getRepository('ByExampleDemoBundle:Item');
    $items = $repo->findItemsBySearchKey($key);

    $youtube = $this->container->get('youtube_api');

    if ($items) {
        foreach ($items as $key => $item) {
            if (is_null($item['YouTubeVideoId'])) {
                $itemToUpdate = $repo->findOneById($item['id']);
                
                $video = $youtube->searchVideo($itemToUpdate->getTitre().' '. $itemToUpdate->getIdArtiste()[0]->getNom());

                $videoId = $youtube->getVideoId($video);
                
                //MAJ de l'item dans le tableau
                $items[$key]['YouTubeVideoId'] = $videoId;

                $itemToUpdate->setYouTubeVideoId($videoId);
                $em->persist($itemToUpdate);
            }          
        }

        $em->flush();
        
        $view->setStatusCode(200)->setData($items);
    } else {
        $view->setStatusCode(404);
    }

    return $view;
  }

/**
  * Renvoie une liste des x musiques les plus écoutées depuis y jours
  * @Route("/items/get/popular")
  * @Method({"GET"})
  * @ApiDoc()
  */
  public function getItemsPopularAction(){

    $view = FOSView::create();
    $days = $this->container->getParameter('popular_parameter_days');
    $limit = $this->container->getParameter('popular_limit');


    $em = $this->getDoctrine()->getManager();
    $repo = $em->getRepository('ByExampleDemoBundle:Item');
    $items = $repo->findItemsByPopularity($days, $limit);


    if ($items !== null) {
            $view->setStatusCode(200)->setData($items);
        } else {
            $view->setStatusCode(404);
        }

    return $view;
}

/**
  * Retourne tous les tags liés a l'item en paramètre
  * @Route("/items/{id}/tags")
  * @Method({"GET"})
  * @ApiDoc()
  */
  public function getItemTagsAction($id){

    $view = FOSView::create();

    $em =$this->getDoctrine()->getManager();
    $repo = $em->getRepository('ByExampleDemoBundle:Item');
    $items = $repo-> findTagsByItem($id);

    if ($items) {
            $view->setStatusCode(200)->setData($items);
        } else {
            $view->setStatusCode(404);
        }

        return $view;
}

/**
  * Retourne un item aléatoire du genre en paramètre
  * @Route("/items/genre/{idGenre}")
  * @Method({"GET"})
  * @ApiDoc()
  */
  public function getItemGenreAction($idGenre){

    $view = FOSView::create();

    $em =$this->getDoctrine()->getManager();
    $repo = $em->getRepository('ByExampleDemoBundle:Item');
    $item = $repo-> findRandomItemByGenre($idGenre);

    if ($item) {
            $view->setStatusCode(200)->setData($item);
        } else {
            $view->setStatusCode(404);
        }

    return $view;
}

/**
  * Retourne un item aléatoire de l'artiste en paramètre
  * @Route("/items/artiste/{idArtiste}")
  * @Method({"GET"})
  * @ApiDoc()
  */
  public function getItemArtisteAction($idArtiste){

    $view = FOSView::create();

    $em =$this->getDoctrine()->getManager();
    $repo = $em->getRepository('ByExampleDemoBundle:Item');
    $item = $repo-> findRandomItemByArtiste($idArtiste);

    if ($item) {
            $view->setStatusCode(200)->setData($item);
        } else {
            $view->setStatusCode(404);
        }

        return $view;
  }


  /**
  * Parcourt la liste des items en BDD et récupère les infos depuis echonest
  * @Route("/items/echonest")
  * @Method({"GET"})
  * @ApiDoc()
  */
  public function getItemEchonestAction(){
     $view = FOSView::create();
     $em =$this->getDoctrine()->getManager();
     $repo = $em->getRepository('ByExampleDemoBundle:Item');

     $items=$repo->findNewItemsAndArtists();
     $infos=[];
     foreach($items as $item){
       $titre=$item["titre"];
       $artist=$item["idartiste"][0]["nom"];

       $params = array("artist" => $artist, "title" => $titre, "bucket" => "song_hotttnesss");
       $param2=array("bucket" =>"audio_summary");
       $param3=array("bucket"=>"artist_familiarity");
       $param4=array("bucket"=>"artist_hotttnesss");
       $url="http://developer.echonest.com/api/v4/song/search?api_key=1N7LROIETL6PEVJAF&format=json&results=1";

       $url .= '&' . http_build_query($params);
       $url .= '&' . http_build_query($param2);
       $url .= '&' . http_build_query($param3);
       $url .= '&' . http_build_query($param4);

       $ch = curl_init();
       curl_setopt ($ch, CURLOPT_HTTPHEADER, array ('Accept: application/json'));
       curl_setopt($ch, CURLOPT_URL, $url );
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       $info=curl_exec($ch);
       $infodecode = json_decode($info, true);

       $repoMusique = $em->getRepository('ByExampleDemoBundle:Musique');
       $repoArtiste = $em->getRepository('ByExampleDemoBundle:Artiste');
       if(!empty($infodecode["response"]["songs"])){
         $repoMusique->putMusicItem($item["id"],$infodecode["response"]);
         //$insertitems = $repo->getAlbumLastFM($item["idartiste"][0]["nom"], $item["idalbum"]);
         if(!isset($item["idalbum"][0]["urlCover"])){
            $insertitems = $repo->getAlbumLastFM($item["idartiste"][0]["nom"], $item["idalbum"], $item["id"]);
         }
         if(!isset($item["idartiste"][0]["urlCover"])){
          $repoArtiste->putMusicArtist($item["idartiste"][0]["id"], $infodecode["response"]);
          $update = $repoArtiste->updateImgArtistLastFM($item["idartiste"], $infodecode["response"]["songs"][0]["artist_id"]);
          $asso = $this->getGenresItemAction($item["idartiste"][0]["id"]);
          //$similar = $repoArtiste->getSimilarArtists($item["idartiste"]);
          
        }
          
       }
       $infos[$item["id"]] = $infodecode;
       curl_close($ch);
     }
     if ($asso) {
            $view->setStatusCode(200)->setData($asso);
        } else {
            $view->setStatusCode(407);
        }

        return $view;
  }




  /**
  * Récupère les infos sur les artistes depuis echonest
  * @Route("/items/getgenres/{idArtist}")
  * @Method({"GET"})
  * @ApiDoc()
  */
  public function getGenresItemAction($idArtist){
     $view = FOSView::create();
     $em =$this->getDoctrine()->getManager();
     $repoGenre = $em->getRepository('ByExampleDemoBundle:Genre');
     $repoArtists = $em->getRepository('ByExampleDemoBundle:Artiste');
     $artist=$repoArtists->find($idArtist);
     $infos=[];
     $artistName=$artist->getNom();
     $params = array("name" => $artistName);
       $url="http://developer.echonest.com/api/v4/artist/terms?api_key=1N7LROIETL6PEVJAF&format=json";

       $url .= '&' . http_build_query($params);

       $ch = curl_init();
       curl_setopt ($ch, CURLOPT_HTTPHEADER, array ('Accept: application/json'));
       curl_setopt($ch, CURLOPT_URL, $url );
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       $info=curl_exec($ch);
       $infodecode = json_decode($info, true);

       curl_close($ch);

      $new = $repoGenre->addGenre($artist, $infodecode["response"]);
         

     

     if ($new) {
            $view->setStatusCode(200)->setData($new);
        } else {
            $view->setStatusCode(407);
        }

        return $view;
  }


  /**
  * Retourne les pistes d'un artiste donné
  * @Route("/items/albums/{idArtiste}")
  * @Method({"GET"})
  * @ApiDoc()
  */
  public function getAlbumByArtisteAction($idArtiste){

    $view = FOSView::create();

    $em =$this->getDoctrine()->getManager();
    $repo = $em->getRepository('ByExampleDemoBundle:Item');
    $albums = $repo->findAlbumByArtist($idArtiste);
    $biography = $albums;
    $i = 0;
    
    foreach ($albums as  $album) {
      $j=0;
        $biography[$i]["tracks"] = [];
        $biography[$i]["tracks"] = $repo->findItemByAlbum($album['id']);
        foreach ($biography[$i]["tracks"] as $track) {
          $biography[$i]["tracks"][$j]["idalbum"][0]=array("id"=> $album['id'], "titre"=>$album["titre"]);
          $j++;
        }
        
        
        $i++;
    }
    if ($biography) {
            $view->setStatusCode(200)->setData($biography);
        } else {
            $view->setStatusCode(404);
        }

        return $view;
  }


  /**
    * Met à jour la note d'un tag sur un item
    * @Route("users/{iduser}/items/{idItem}/tags/{idTag}")
    * @Method({"PUT"})
    * @ApiDoc()
    */

    public function putNoteTagItemAction($iduser,$idItem, $idTag){
      $view = FOSView::create();
      if($this->get('request')->getMethod() == "PUT"){
        $note_tag= $this->container->getParameter('note_tag');
          $param = $this->get('request')->request->get('param');
          $em =$this->getDoctrine()->getManager();
          $type= $this->container->getParameter('type_note_tag');
          $repo = $em->getRepository('ByExampleDemoBundle:Note');
          $note=$repo->addNoteTagItem($idTag, $idItem, $iduser, $param, $note_tag, $type);
          if ($note) {
                  $view->setStatusCode(200)->setData($note);
              } else {
                  $view->setStatusCode(404);
              }
            }
      return $view;

    }

    /**
      * Récupère les deux notes d'un tag sur un item
      * @Route("users/{iduser}/items/{idItem}/tags/{idTag}")
      * @Method({"GET"})
      * @ApiDoc()
      */

      public function getNoteTagItemAction($iduser,$idItem, $idTag){
        $view = FOSView::create();
        $em =$this->getDoctrine()->getManager();
        $notes=array();
        $repo = $em->getRepository('ByExampleDemoBundle:Note');
        $noteUtil=$repo->findByItemTagUser($idItem,$idTag, $iduser);

        if ($noteUtil) {
                    $view->setStatusCode(200)->setData($noteUtil);
                } else {
                    $view->setStatusCode(404);

              }
        return $view;

      }


    /**
      * Met à jour le nombre de vues d'un item
      * @Route("/items/{idItem}/vues/")
      * @Method({"PUT"})
      * @ApiDoc()
      */
      public function updateViewItemAction($idItem){
        $view = FOSView::create();
        $em =$this->getDoctrine()->getManager();
        $repo = $em->getRepository('ByExampleDemoBundle:Item');
        $notes = $repo->updateView($idItem);
        if ($notes) {
                $view->setStatusCode(200)->setData($notes);
            } else {
                $view->setStatusCode(404);
            }

            return $view;
          }
   

    /**
  * Recherche des items dans la base en fonction du mot clé donné en paramètre
  * @Route("/items/grooveshark/search/{key}")
  * @Method({"GET"})
  * @ApiDoc()
  */
    public function searchItemGroovesharkAction($key){
      $view = FOSView::create();
      $api_key=$this->container->getParameter('api_key');
      $api_key_last=$this->container->getParameter('api_key_last');
      $array=[];
      $params = array("track" => $key, "api_key" => $api_key_last, "format" => "json", "limit" => "30");
      
       $url="http://ws.audioscrobbler.com/2.0/?method=track.search";

       $url .= '&' . http_build_query($params);
      

       $ch = curl_init();
       curl_setopt ($ch, CURLOPT_HTTPHEADER, array ('Accept: application/json'));
       curl_setopt($ch, CURLOPT_URL, $url );
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       $info=curl_exec($ch);
       $infodecode = json_decode($info, true);
       if($infodecode){
        foreach($infodecode["results"]["trackmatches"]["track"] as $track){
          $url="http://api.rhapsody.com/v1/search/typeahead";
          $params = array("q" => $track["name"], "type" => "track");
                $url .= "?". http_build_query($params);

                $ch = curl_init();
                curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'apikey:'.$api_key));
                curl_setopt($ch, CURLOPT_URL, $url );
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $info=curl_exec($ch);
                $infodecode2 = json_decode($info, true);
                foreach($infodecode2 as $songRhapsody){
                  if($songRhapsody["artist"]["name"]==$track["artist"]){
                    array_push($array,$songRhapsody);
                  }
                
                
                }
        }
       }
       /*if($infodecode){
        foreach($infodecode["response"]["songs"] as $song){
          if($song["tracks"][0]["foreign_id"]){
            $result=explode(":", $song["tracks"][0]["foreign_id"]);
            $id_rhapso = $result[2];
            //$params = array("" => $key, "type" => "track");

              $url="http://api.rhapsody.com/v1/tracks/".$id_rhapso;

              //$url .= "?". http_build_query($params);


              $ch = curl_init();
              curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'apikey:'.$api_key));
              curl_setopt($ch, CURLOPT_URL, $url );
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              $info=curl_exec($ch);
              $songs = json_decode($info, true);
              if($songs["code"]){
                $url="http://api.rhapsody.com/v1/search/typeahead";
                $params = array("q" => $song["title"], "type" => "track");
                $url .= "?". http_build_query($params);

                $ch = curl_init();
                curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'apikey:'.$api_key));
                curl_setopt($ch, CURLOPT_URL, $url );
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $info=curl_exec($ch);
                $infodecode2 = json_decode($info, true);
                foreach($infodecode2 as $songRhapsody){
                  if($songRhapsody["artist"]["name"]==$song["artist_name"]){
                    array_push($array,$songRhapsody);
                  }
                
                
                }
              }
              else{
                  //$songs=$infodecode;
                  array_push($array, $songs);
                }

              
            }
        }
        //$result=explode(":",$infodecode["response"]["songs"][0]["tracks"][0]["foreign_id"]);
        //$id_rhapso=
       }

      /*$params = array("q" => $key, "type" => "track");

            $url="http://api.rhapsody.com/v1/search/typeahead";

            $url .= "?". http_build_query($params);


            $ch = curl_init();
            curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'apikey:'.$api_key));
            curl_setopt($ch, CURLOPT_URL, $url );
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $info=curl_exec($ch);
            $infodecode = json_decode($info, true);*/

       if($array){
        $view->setStatusCode(200)->setData($array);
      }
      else{
        $view->setStatusCode(404);
      }

      return $view;
    }
  


    /**
    * Insère titre / album et artiste sommairement
    * @Post("items")
    * @ApiDoc()
    */
    public function addItemArtisteAction(){
      $view = FOSView::create();
      
      if($this->get('request')->getMethod() == "POST"){
        $em =$this->getDoctrine()->getManager();
       
        $url = $this->getRequest()->request->get('url');
        $titre = $this->getRequest()->request->get('titre');
        $nomAlbum=$this->getRequest()->request->get('nomAlbum');
        $duration=$this->getRequest()->request->get('duration');
        $nom = $this->getRequest()->request->get('nom');
       
        $repo = $em->getRepository('ByExampleDemoBundle:Item');
       
        $success = $repo->addItemArtiste($url, $titre, $nomAlbum, $nom, $duration);
      }
      if($success){
        $view->setStatusCode(200)->setData($success);
      }
      else{
        $view->setStatusCode(404);
      }

      return $view; 
    }


     /**
      * Recherche un item sur xbox
      * @Get("items/xbox/search")
      * @ApiDoc()
      */
      public function getSearchXboxAction(){
        $view = FOSView::create();
        $em =$this->getDoctrine()->getManager();
        $MusicAPI = new Xboxmusic;
        $token = $MusicAPI->auth();
        $json_response = $MusicAPI->search("rihanna", $token);
        $response = json_decode($json_response, true);
        
        if ($response) {
                $view->setStatusCode(200)->setData($response);
            } else {
                $view->setStatusCode(404);
            }

            return $view;
          }

             

      /**
      * Streaming xbox
      * @Route("/items/xbox/streaming")
      * @Method({"GET"})
      * @ApiDoc()
      */
      public function getXboxAction(){
        $view = FOSView::create();
        $em =$this->getDoctrine()->getManager();
        $MusicAPI = new Xboxmusic;
        $token = $MusicAPI->auth();
        $json_response=$MusicAPI->authenticateuser($token);
      //$json_response = $MusicAPI->streaming("music.E2F10200-0200-11DB-89CA-0019B92A3933", $token);
        //$response = json_decode($json_response, true);
        
        if ($json_response) {
                $view->setStatusCode(200)->setData($json_response);
            } else {
                $view->setStatusCode(404);
            }

            return $view;
          }
   

   /**
      * Authorization code xbox
      * @Route("/items/xbox/streaming")
      * @Method({"POST"})
      * @ApiDoc()
      */
      public function postXboxAuthorizationAction(){
        $view = FOSView::create();
        $em =$this->getDoctrine()->getManager();
        $code = $this->getRequest()->request->get('code');
        $MusicAPI = new Xboxmusic;
        $token = $MusicAPI->auth();
        $json_response=$MusicAPI->gettoken($code);
        $access=json_decode($json_response, true)["access_token"];

        $json2=$MusicAPI->xboxlive($access);
        $xasu = json_decode($json2, true)["Token"];
        $json2 = $MusicAPI->getXSTS($xasu);
        $xsts=json_decode($json2,true);
        $xtoken=$xsts["Token"];
        $uhs = $xsts["DisplayClaims"]["xui"][0]["uhs"];
        /*$json_response = $MusicAPI->streaming("music.A83EB907-0100-11DB-89CA-0019B92A3933", $token, $uhs, $xtoken);
        $response = json_decode($json_response, true);
        $url=$response["Url"];*/
        $infos = array($uhs, $xtoken);
        //$slaut = "ahdsd";
        if ($infos) {
                $view->setStatusCode(200)->setData($infos);
            } else {
                $view->setStatusCode(404);
            }

            return $view;
          }

          /**
      * Streaming xbox
      * @Route("/items/xbox/streaming/{iditem}")
      * @Method({"GET"})
      * @ApiDoc()
      */
      public function getXboxStreamingAction($iditem){
        $view = FOSView::create();
        $em =$this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $xtoken = $request->query->get('xtoken');
        $uhs =  $request->query->get('uhs');
        
        $MusicAPI = new Xboxmusic;
        $token = $MusicAPI->auth();

        $json_response = $MusicAPI->streaming("music.A83EB907-0100-11DB-89CA-0019B92A3933", $token, $uhs, $xtoken);
        $response = json_decode($json_response, true);
        $url=$response["Url"];
        //$slaut = "ahdsd";
        if ($url) {
                $view->setStatusCode(200)->setData(array($url));
            } else {
                $view->setStatusCode(404);
            }

            return $view;
          }










 }
