<?php

namespace PriseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PriseBundle:Default:index.html.twig');
    }
}
