<?php

namespace App\Controller;


use App\Entity\Matchh;
use App\Form\MatchhType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MatchhController extends AbstractController
{
    /**
     * @Route("/matchh", name="app_matchh")
     */
    public function index(): Response
    {
        return $this->render('matchh/index.html.twig', [
            'controller_name' => 'MatchhController',
        ]);
    }
    /**
     * @Route("/liste", name="afficher_match")
     */
    public function afficher(): Response
    {
        $matchs = $this->getDoctrine()
            ->getRepository(Matchh::class)
            ->findAll();

        return $this->render('matchh/index.html.twig', [
            'matchs' => $matchs,
        ]);
    }
    /**
     * @Route("/listeAdd", name="ajouter_match")
     */
    public function ajouter(Request $request): Response
    {
        $match = new Matchh();

        $form = $this->createForm(MatchhType::class, $match);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $match = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($match);
            $em->flush();

            return $this->redirectToRoute('afficher_match');
        }

        return $this->render('matchh/ajoutMatch.html.twig', [
            'match' => $match,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/listeDelete/{id}", name="supprimer_match")
     */
    public
    function supprimer($id): Response
    {

        $tournoi = $this->getDoctrine()
            ->getRepository(Matchh::class)
            ->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($tournoi);
        $em->flush();
        return $this->redirectToRoute('afficher_match');
    }

    /**
     * @Route("/listeModif/{id}", name="modifier_match")
     */
    public function modifier($id,Request $request): Response
    {
        $match = $this->getDoctrine()
            ->getRepository(Matchh::class)
            ->find($id);

        $form = $this->createForm(MatchhType::class, $match);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $em->flush();

            return $this->redirectToRoute('afficher_match');
        }

        return $this->render('matchh/modifierMatch.html.twig', [
            'match' => $match,
            'form' => $form->createView(),
        ]);
    }
}
