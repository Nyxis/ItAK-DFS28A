<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HelloWorldController extends AbstractController
{ 
    public function helloThere(): Response
    {
        return $this->render('hello_world/index.html.twig', [

        ]);
    }
}

?>