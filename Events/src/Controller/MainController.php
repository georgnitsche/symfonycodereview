<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
                $events = $this->getDoctrine()->getRepository('App:Events')->findAll();
        return $this->render('home/index.html.twig');
    
    }
}
