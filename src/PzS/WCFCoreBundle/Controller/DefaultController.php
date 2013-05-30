<?php

namespace PzS\WCFCoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PzSWCFCoreBundle:Default:index.html.twig', array('name' => $name));
    }
}
