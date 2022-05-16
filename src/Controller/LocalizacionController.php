<?php

namespace App\Controller;

use App\Repository\LocalizacionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocalizacionController extends AbstractController
{
    /**
     * @Route("/localizacion/listar", name="listar_locNoPadre")
     */
    public function locNoPadre(LocalizacionRepository $localizacionRepository): Response
    {
        $localizaciones = $localizacionRepository->findNoPadre();

        return $this->render('localizaciones/listarNoPadre.html.twig', [
            'localizaciones' => $localizaciones
        ]);
    }

    /**
     * @Route("/localizacion/listarHijas/{id}", name="listar_locHijas")
     */
    public function locHijas(LocalizacionRepository $localizacionRepository, int $id): Response
    {
        $localizaciones = $localizacionRepository->findHijas($id);

        return $this->render('localizaciones/listarHijas.html.twig', [
            'localizaciones' => $localizaciones
        ]);
    }
}