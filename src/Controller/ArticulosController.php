<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArticulosController extends AbstractController
{
    #[Route('/articulos', name: 'app_articulos')]
    public function index(): Response {
        $array_articulos = $this->getDatos();
        return $this->render('articulos/index.html.twig', compact('array_articulos'));
    }

    #[Route('/articulos/{id}', name: 'articulosById')]
    public function articulosById(string $id): Response {
        foreach ($this->getDatos() as $articulo) {
            if (strcmp($id, $articulo['id']) == 0) {
                return $this->render('articulos/index.html.twig', compact('articulo'));
            }
        }
        $articulo = null;
        return $this->render('articulos/index.html.twig', compact('articulo'));
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
