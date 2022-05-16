<?php

namespace App\Controller;

use App\Repository\MaterialRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrestamoController extends AbstractController
{
    /**
     * @Route("/material/listar/{id}", name="listar_mat")
     */
    public function matListar(MaterialRepository $materialRepository): Response
    {
        $materiales = $materialRepository->findNoDisp();

        return $this->render('materiales/listarNoDisp.html.twig', [
            'materiales' => $materiales
        ]);
    }
}