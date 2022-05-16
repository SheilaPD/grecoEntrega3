<?php

namespace App\Controller;

use App\Repository\PersonaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonaController extends AbstractController
{
    /**
     * @Route("/persona/listar", name="listar_per")
     */
    public function perListar(PersonaRepository $personaRepository): Response
    {
        $personas = $personaRepository->findPer();

        return $this->render('personas/listado.html.twig', [
            'personas' => $personas
        ]);
    }
}