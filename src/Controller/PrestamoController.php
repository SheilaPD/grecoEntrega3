<?php

namespace App\Controller;

use App\Repository\HistorialRepository;
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

    /**
     * @Route("/prestamo/materiales", name="listar_presMateriales")
     */
    public function presMateriales(MaterialRepository $materialRepository): Response
    {
        $materiales = $materialRepository->findAll();

        return $this->render('prestamos/listarMat.html.twig', [
            'materiales' => $materiales
        ]);
    }

    /**
     * @Route("/prestamo/historial/{id}", name="listar_historial")
     */
    public function listarHistorial(HistorialRepository $historialRepository, int $id): Response
    {
        $prestamos = $historialRepository->findAll();

        return $this->render('prestamos/listarHis.html.twig', [
            'prestamos' => $prestamos
        ]);
    }
}