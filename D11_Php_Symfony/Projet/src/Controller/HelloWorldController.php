<?php

namespace App\Controller;

use App\Entity\Product;
use App\Persistence\DatabasePersistence;
use App\Persistence\FilePersistence;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HelloWorldController extends AbstractController
{
    public function __invoke(
        DatabasePersistence $databasePersistence,
        FilePersistence $filePersistence,
    ): Response
    {
        $product = new Product();
        $product->setDesignation("Example Product");
        $product->setUnivers("Electronics");
        $product->setPrice(999);

        $productRepository = new ProductRepository($databasePersistence);
        $dbSave = $productRepository->save($product);

        $productRepository = new ProductRepository($filePersistence);
        $fileSave = $productRepository->save($product);

        if ($dbSave) {
            $this->addFlash('success', 'Produit ajouté en db!');
        }

        if ($fileSave) {
            $this->addFlash('success', 'Produit ajouté dans le fichier!');
        }

        return $this->render('hello_world/index.html.twig', []);
    }
}
