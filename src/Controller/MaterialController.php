<?php

namespace App\Controller;

use App\Repository\MaterialRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MaterialController extends AbstractController
{
    /**
     * @Route("/material/listar/{id}", name="listar_mat")
     */
    public function productoListar(MaterialRepository $materialRepository, int $id): Response
    {
        $materiales = $materialRepository->findLoc($id);

        return $this->render('materiales/listarMat.html.twig', [
            'materiales' => $materiales
        ]);
    }
}