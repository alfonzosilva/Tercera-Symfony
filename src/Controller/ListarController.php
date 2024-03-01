<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ListarController extends AbstractController
{
    #[Route('/listar/{id}', name: 'listarById')]
    public function listarById(string $id = '2'): Response {
        foreach ($this->getDatos() as $articulo) {
            if (strcmp($id, $articulo['id']) == 0) {
                return $this->render('listar/listarArticulos.hml.twig', compact('articulo'));
            }
        }
        $articulo = null;
        return $this->render('listar/listarArticulos.hml.twig', compact('articulo'));
    }

    #[Route('/listararticulos', name: 'listarArticulos')]
    public function listarArticulos(): Response {
        //return $this->redirectToRoute('app_articulos');
        $array_articulos = $this->getDatos();
        return $this->render('listar/listarArticulos.hml.twig', compact('array_articulos'));
    }

    private function getDatos() {
        return array(
            array("id" => 1, "title" => "Iphone", "created" => "2024-02-28"),
            array("id" => 2, "title" => "Ipad", "created" => "2024-02-27"),
            array("id" => 3, "title" => "IMac", "created" => "2024-02-26"),
            array("id" => 4, "title" => "Ipod", "created" => "2024-02-25"),
            array("id" => 5, "title" => "MacBook Pro", "created" => "2024-02-24")
        );
    }
}
