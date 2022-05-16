<?php

namespace App\Controller;

use App\Repository\MaterialRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrestamoController extends AbstractController
{
    /**
     * @Route("/prestamo", name="seleccionar_pres")
     */
    public function selPres(): Response
    {
        return $this->render('prestamos/prestamos.html.twig');
    }

    /**
     * @Route("/prestamo/listar", name="listar_pres")
     */
    public function presListar(MaterialRepository $materialRepository): Response
    {
        $materiales = $materialRepository->findNoDisp();

        return $this->render('materiales/listarNoDisp.html.twig', [
            'materiales' => $materiales
        ]);
    }
}