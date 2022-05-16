<?php

namespace App\Controller;

use App\Repository\LocalizacionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InventarioController extends AbstractController
{
    /**
     * @Route("/inventario/listar", name="listar_loc")
     */
    public function locListar(LocalizacionRepository $localizacionRepository): Response
    {
        $localizaciones = $localizacionRepository->findOrd();

        return $this->render('inventario/listarLoc.html.twig', [
            'localizaciones' => $localizaciones
        ]);
    }
}