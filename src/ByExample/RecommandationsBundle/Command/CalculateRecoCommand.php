<?php

namespace ByExample\RecommandationsBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CalculateRecoCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('calculateReco')
            ->setDescription('Launch precalculated algorithms')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $precalculated = false;
    	$em = $this->getContainer()->get('doctrine')->getManager();

        $algorithms=array();
        $currentTest = $em->getRepository('ByExampleRecommandationsBundle:Test')->currentTest("false");
      $listalgos=[];
        

     //error_log($currentTest[0]["id"]);
     //error_log($currentTest["id"]);
      foreach($currentTest[0]["idgroup"] as $groups){
        $users = $em->getRepository('ByExampleRecommandationsBundle:Group')->getUsersFromGroup($groups["id"]);
        foreach ($users as $user) {
            
        
            foreach($groups["idalgorithm"] as $algorithm){
                
                //Si l'algorithme a l'attribut precalculated, on va chercher les recommandations des utilisateurs dans la BDD
                if($algorithm["precalculated"] == true){
                  //array_push($algorithms, $algorithm["nom"]);
                  $precalculated=true;
                  $url="http://localhost:8080/PapayeStrategy/webresources/algorithms/".$user['id']."/algo?";
      
                  $params = array("algorithm" => $algorithm["nom"]);
                  $url.= http_build_query($params) . "&";
                    
                 

                  $ch = curl_init();
                  curl_setopt ($ch, CURLOPT_HTTPHEADER, array ('Accept: application/json'));
                  curl_setopt($ch, CURLOPT_URL, $url );
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  $info=curl_exec($ch);
              }
            
            }

        }
    }
        //foreach($test[])
            
        
        $output->writeln("finish");

    }
}




?>