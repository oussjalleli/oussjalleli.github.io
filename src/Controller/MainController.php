<?php

namespace App\Controller;

use App\Entity\Evenement;

use App\Repository\EvenementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/Event", name="main")
     */
    public function index(EvenementRepository $calendar): Response
    {
        $events = $calendar->findAll();

        $rdvs = [];

        foreach($events as $event){
            $rdvs[] = [
                'id' => $event->getIdEvenement(),
                'start' => $event->getDateEvenement(),
                'end' => $event->getDateEvenement(),
                'title' => $event->getNom(),
                'description' => $event->getDescription()
            ];
        }

        $data = json_encode($rdvs);

        return $this->render('main/index.html.twig', compact('data'));
    }
}
