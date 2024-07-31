<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Persistence\DatabasePersistence;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    public function __invoke(
        ProductRepository $productRepository
    ): Response
    {
        $products = $productRepository->getAll();

        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }

    public function new(
        ProductRepository $productRepository,
        Request $request
    ): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $product->designation = $data->designation;
            $product->univers = $data->univers;
            $product->price = $data->price;

            $productRepository->save($product);

            $this->addFlash('success', 'Le produit à bien été ajouté!');

            return $this->redirectToRoute('products_index');
        }

        return $this->render('product/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
    public function edit(
        int $id,
        ProductRepository $productRepository,
        Request $request
    ): Response
    {
        $product = $productRepository->getById($id);

        if (empty($product)) {
            $this->addFlash('error', 'Le produit est introuvable !');
            return $this->redirectToRoute('products_index');
        }

        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $product->designation = $data->designation;
            $product->univers = $data->univers;
            $product->price = $data->price;

            $productRepository->update($product);

            $this->addFlash('success', 'Le produit à bien été modifié!');

            return $this->redirectToRoute('products_index');
        }

        return $this->render('product/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function delete(
        int $id,
        ProductRepository $productRepository,
    ): Response
    {
        $deleted = $productRepository->delete($id);

        if ($deleted) {
            $this->addFlash('success', 'Le produit a été supprimé !');
        } else {
            $this->addFlash('Error', "Le produit n'a pas pu être supprimé !");
        }

        return $this->redirectToRoute('products_index');
    }
}
