<?php

namespace App\Controller;

use App\Persistence\DatabasePersistence;
use App\Persistence\FilePersistence;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    public function __invoke(
        DatabasePersistence $databasePersistence,
        ): Response
    {
        $productRepository = new ProductRepository($databasePersistence);
        $products = $productRepository->getAll();

        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }

    public function new(
        DatabasePersistence $databasePersistence,
    ): Response
    {
        $productRepository = new ProductRepository($databasePersistence);
        $products = $productRepository->getAll();

        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }
    
    public function edit(
        int $id,
        DatabasePersistence $databasePersistence,
    ): Response
    {
        $productRepository = new ProductRepository($databasePersistence);
        $product = $productRepository->getById($id);

        if (empty($product)) {
            $this->addFlash('error', 'Le produit est introuvable !');
            return $this->redirectToRoute('products_index');
        }

        return $this->render('product/edit.html.twig', [
            'product' => $product,
        ]);
    }

    public function delete(
        int $id,
        DatabasePersistence $databasePersistence,
    ): Response
    {
        $productRepository = new ProductRepository($databasePersistence);
        $deleted = $productRepository->delete($id);

        if ($deleted) {
            $this->addFlash('success', 'Le produit a été supprimé !');
        } else {
            $this->addFlash('Error', "Le produit n'a pas pu être supprimé !");
        }

        return $this->redirectToRoute('products_index');
    }
}
