<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrincipalController extends AbstractController
{
    /**
     ** @Route("/", name="bienvenida")
     */
    public function bienvenida() : Response
    {
        return $this->render('layout.html.twig');
    }
}