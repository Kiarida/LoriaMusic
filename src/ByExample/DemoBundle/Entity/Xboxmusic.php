<?php
namespace ByExample\DemoBundle\Entity;


class Xboxmusic {
      var $serviceauth = "https://datamarket.accesscontrol.windows.net/v2/OAuth2-13";
      var $serviceapi = "https://music.xboxlive.com/1/content";
      var $clientId = "lm-2015";
      var $idclient="000000004C155781";
      var $instanceclient="5b559245-96ed-4cf2-a4de-e0a13d66609c";
      var $secretclient="Cubdrl61OPXhIC7qAnYdKu6LALOeIIC9";
      var $clientSecret = "G4Bmir1f2RCCMkfZXpOJ2iDyba4bxJMjj+JjliRfIiQ=";
      var $scope = "http://music.xboxlive.com";
      var $grantType = "client_credentials";
      var $redirect="http://develop.api";

      public function auth() {
          $requestData = array("client_id" => $this->clientId, "client_secret" => $this->clientSecret, "scope" => $this->scope, "grant_type" => $this->grantType);
          $options = array(
              'http' => array(
                  'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                  'method'  => 'POST',
                  'content' => http_build_query($requestData),
              ),
          );
          $context  = stream_context_create($options);
          $response = json_decode(@file_get_contents($this->serviceauth, false, $context),true);
          $token = $response['access_token'];
          return $token;
      }

      public function search($string,$token) {
          $url = $this->serviceapi.'/music/search?q='.urlencode($string).'&accessToken=Bearer+'.urlencode($token);
          $response = @file_get_contents($url);
          return $response;
          //return $url;
      }

      public function lookup($ids_array,$token, $extras = '') {
          $string = '';
          foreach($ids_array as $value) {
              $string .= $value.'+';
          }
          $string = rtrim($string, '+');
          if(!empty($extras)) $url = $this->serviceapi.'/'.$string.'/lookup?accessToken=Bearer+'.urlencode($token).'&extras='.$extras;
          else $url = $this->serviceapi.'/'.$string.'/lookup?accessToken=Bearer+'.urlencode($token);
          $response = @file_get_contents($url,true);
          return $response;
      }

      public function gettoken($code){
        $url="https://login.live.com/oauth20_token.srf?client_id=".urlencode($this->idclient)."&client_secret=".urlencode($this->secretclient)."&redirect_uri=".urlencode($this->redirect)."&code=".urlencode($code)."&grant_type=authorization_code";
        $response = @file_get_contents($url);
          //return $response;
          return $response;

      }

      public function authenticateuser($token){

        //$url = 'https://login.live.com/oauth20_authorize.srf?client_id='.urlencode($clientId).'&scope=wl.signin%20wl.basic&response_type=code&redirect_uri=http%3A%2F%2Fdevelop.api&?access_token='.urlencode($token).'';
        $url="https://login.live.com/oauth20_authorize.srf?client_id=".urlencode($this->idclient)."&scope=XboxLive.Music%20XboxLive.SignIn&response_type=code&redirect_uri=".urlencode($this->redirect)."&access_token=".urlencode($token)."";

        $info = @file_get_contents($url, true);

        //$ch = curl_init();
       
      //curl_setopt ($ch, CURLOPT_URL, $url);
        //     curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
       //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //$info=curl_exec($ch);
       //$infodecode = json_decode($info, true);

       return $url;
        /*$data = array('RelyingParty'=>'http://auth.xboxlive.com',  "TokenType" => 'JWT', 'Parameters' => array("AuthMethod"=>"RPS", "SiteName"=>"user.auth.xboxlive.com"));

        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => array("x-xbl-contract-version: 0"),
                'method'  => 'POST',
                //'RelyingParty' => "http://auth.xboxlive.com",
                //'TokenType' => 'JWT',
                //'Parameters' => array("AuthMethod"=>"RPS", "SiteName"=>"user.auth.xboxlive.com"),
                'content' => http_build_query($data),
            ),
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $requestHeaders = apache_request_headers();
        //var_dump($result);
        */

        /*

        $url="https://user.auth.xboxlive.com/user/authenticate";
        

        //$url .= '&' . http_build_query($params);

       $ch = curl_init();
       
      curl_setopt ($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       //curl_setopt ($ch, CURLOPT_HTTPHEADER, array ('Accept: application/json', 'x-­xbl-­contract­-version: 0', 'RelyingParty:http://auth.xboxlive.com', 'TokenType:JWT'));
       curl_setopt ($ch, CURLOPT_HTTPHEADER, array('x-xbl-contract-version: 0', 'Accept: application/json'));
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

       curl_setopt($ch, CURLOPT_POSTFIELDS, "AuthMethod=RPS&SiteName=user.auth.xboxlive.com");
       $info=curl_exec($ch);
       $infodecode = json_decode($info, true);
       return curl_getinfo($ch);
       */
       
      }

      public function xboxlive($access){
        $url = 'https://user.auth.xboxlive.com/user/authenticate';
         $fieldsProp=array(
          'AuthMethod' => 'RPS',
          'SiteName' => urlencode('user.auth.xboxlive.com'),
          'RpsTicket' => 'd='.urlencode($access)
          );

        $fields = array(
                    'RelyingParty' => "http://auth.xboxlive.com",
                    'TokenType' => 'JWT',
                    'Properties' => $fieldsProp,
                );
        

        //url-ify the data for the POST
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');
        $json="";
        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, count($fields));
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        curl_setopt ($ch, CURLOPT_HTTPHEADER, array('x-xbl-contract-version: 0', 'Content-Type: application/json'));

        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        return $result;
        
      }

      public function getXSTS($token){
        $url = 'https://xsts.auth.xboxlive.com/xsts/authorize';
         $fieldsProp=array(
          'UserTokens' => array(urlencode($token)),
          'SandboxId' => 'RETAIL',
          );

        $fields = array(
                    'RelyingParty' => "http://music.xboxlive.com",
                    'TokenType' => 'JWT',
                    'Properties' => $fieldsProp,
                );
        

        //url-ify the data for the POST
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');
        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, count($fields));
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        curl_setopt ($ch, CURLOPT_HTTPHEADER, array('x-xbl-contract-version: 1', 'Content-Type: application/json'));

        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        //return $fields;
        return $result;
        
      }

      public function streaming($string, $token, $uhs, $xtoken){
        $url = $this->serviceapi.'/'.$string.'/stream?clientInstanceId='.urlencode($this->instanceclient).'&accessToken=Bearer+'.urlencode($token);
        //open connection
        $ch = curl_init();
        $header ='XBL3.0 x='.$uhs.';'.$xtoken; 
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Authorization: '.$header, 'Content-Type: application/json'));

        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);


          /*$options = array(
              'http' => array(
                  'header'  => "Content-type: application/json, XBL3.0 x=".$uhs.";".$xtoken,
                  'method'  => 'GET',
              ),
          );
          $context  = stream_context_create($options);
          $response = json_decode(@file_get_contents($url, false, $context),true);
          //$token = $response['access_token'];
          //return $token;
        //          $url = $this->serviceapi.'/'.$string.'/stream';

         // $response = @file_get_contents($url);
          //return $response;
          */
          return $result;
          //return $result;
      }

  }
  ?>