<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TesterController extends AbstractController
{
    /**
     * @Route("/tester", name="tester")
     */
    public function index(): Response
    {
        return $this->render('tester/index.html.twig', [
            'controller_name' => 'TesterController',
        ]);
    }
}
