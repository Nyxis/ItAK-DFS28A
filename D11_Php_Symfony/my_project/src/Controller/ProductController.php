<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ProductType;
use App\Entity\Product;
use App\Service\DatabaseService;
use App\Service\ProductService;

class ProductController extends AbstractController {
    public function __construct(
        private DatabaseService $databaseService
    )
    {
        
    }

    public function indexProduct() {
        $products = $this->databaseService->sqlQuery('SELECT * FROM products')->fetchAll();
        dd($products);
        return new Response('');
    }
}

?>