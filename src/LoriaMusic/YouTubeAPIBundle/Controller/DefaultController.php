<?php

namespace LoriaMusic\YouTubeAPIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LoriaMusicYouTubeAPIBundle:Default:index.html.twig', array('name' => $name));
    }
}
