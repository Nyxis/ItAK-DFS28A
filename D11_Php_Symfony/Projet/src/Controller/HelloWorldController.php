<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HelloWorldController extends AbstractController
{
    public function __invoke(
    ): Response
    {
        return $this->render('hello_world/index.html.twig', []);
    }
}
