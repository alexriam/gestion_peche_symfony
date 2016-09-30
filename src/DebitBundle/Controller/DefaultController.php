<?php

namespace DebitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DebitBundle:Default:index.html.twig');
    }
}
