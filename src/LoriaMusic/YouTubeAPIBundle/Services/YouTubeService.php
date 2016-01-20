<?php

namespace LoriaMusic\YouTubeAPIBundle\Services;

class YouTubeService extends \Google_Service_YouTube
{
	public $client;

	public $api_key = 'AIzaSyCUMV3rjzWa4XK8y_yQm2hsieLuYKyw1dM';

	public function __construct()
    {
        $this->client = new \Google_Client();
        $this->client->setDeveloperKey($this->api_key);
        parent::__construct($this->client);
    }

    public function searchVideo($key_search) {
    	$item = $this->search->listSearch('id,snippet', array( 
				    											'q' => $key_search,
				                                                'order' => 'relevance',
				                                                'maxResults' => 1,
				                                                'type' => 'video',
                                            				)
    									);

    	$video = $item['items'];

    	return $video;
    }

    public function getVideoId($video) {
    	return $video[0]['id']['videoId'];
    }
}