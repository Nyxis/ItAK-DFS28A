<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ProductType;
use App\Entity\Product;
use App\Service\ProductService;

class ProductController extends AbstractController {
    private $productService;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }

    #[Route('/product', name: 'product')]  

    public function index(): Response {
        $success = $this->productService->saveProduct(['name' => 'Produit 1']);

        return $this->render('produit.html.twig', ['message' => $success ? 'Produit enregistré avec succès!' : 'Erreur lors de l\'enregistrement du produit.']);
    }
}

?>