<?php

namespace ByExample\DemoBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GetMetadataCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('getMetadata')
            ->setDescription('Get metadata from echonest for new items')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	$em = $this->getContainer()->get('doctrine')->getManager();
        


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
       $repoTag= $em->getRepository('ByExampleDemoBundle:Tag');
       if(!empty($infodecode["response"]["songs"])){
         $repoMusique->putMusicItem($item["id"],$infodecode["response"]);
         //$insertitems = $repo->getAlbumLastFM($item["idartiste"][0]["nom"], $item["idalbum"]);
         if(!isset($item["idalbum"][0]["urlCover"])){
            $insertitems = $repo->getAlbumLastFM($item["idartiste"][0]["nom"], $item["idalbum"], $item["id"]);
         }
         if(!isset($item["idartiste"][0]["urlCover"])){
          $repoArtiste->putMusicArtist($item["idartiste"][0]["id"], $infodecode["response"]);
          $repoArtiste->updateImgArtistLastFM($item["idartiste"], $infodecode["response"]["songs"][0]["artist_id"]);
          $asso = $this->getGenresItemAction($item["idartiste"][0]["id"]);
          $similar = $repoArtiste->getSimilarArtists($item["idartiste"]);
          
        }
          
       }
       $infos[$item["id"]] = $infodecode;
     
      $params = array("artist" => $artist, "track" => $titre, "format" => "json");
       $url="http://ws.audioscrobbler.com/2.0/?method=track.getTopTags&api_key=30c3c9603ff7e5fba386bf8348abdb46";

       $url .= '&' . http_build_query($params);
       

       $ch = curl_init();
       curl_setopt ($ch, CURLOPT_HTTPHEADER, array ('Accept: application/json'));
       curl_setopt($ch, CURLOPT_URL, $url );
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       $info=curl_exec($ch);
       $infodecode = json_decode($info, true);
       $i =0;
       foreach ($infodecode as $value){
        foreach($value["tag"] as $tag){
          if($i < 5){
            array_push($infos, $tag["name"]);
            $repoTag->addTagItem($item["id"], $tag["name"]);
            $i++;
          }
        }
       }
     }

       curl_close($ch);
     





        $em->flush();
        $output->writeln("End");

    }




    public function getGenresItemAction($idArtist){
     $em = $this->getContainer()->get('doctrine')->getManager();
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
            return $new;
        } 
      }



}




?>