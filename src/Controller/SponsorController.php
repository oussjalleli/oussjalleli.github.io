<?php

namespace App\Controller;

use App\Entity\Sponsor;
use App\Form\SponsorType;
use App\Repository\SponsorRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;


class SponsorController extends AbstractController
{
    /**
     * @Route("/sponsor", name="app_evenement")
     */
    public function index(): Response
    {
        return $this->render('sponsor/show.html.twig', [
            'controller_name' => 'SponsorController',
        ]);
    }

    /**
     * @Route("/listSponsor",name="SponsorListPage")
     */
    public function listSponsor(Request $request, PaginatorInterface $paginator): Response
    {

        //get the data from the DB
        $donnees = $this->getDoctrine()
            ->getManager()->getRepository(Sponsor::class)
            ->findAll();
        $data=$paginator->paginate(
          $donnees,
          $request->query->getInt('page',1),
          4
        );
        return $this->render('sponsor/show.html.twig', array(
            //data
            'liste' => $data
        ));
    }

    /**
     * @Route("/frontSponsor",name="FrontSponsorPage")
     */
    public function frontSponsor(): Response
    {

        //get the data from the DB
        $data = $this->getDoctrine()
            ->getManager()->getRepository(Sponsor::class)
            ->findAll();
        //test the render of the database
        //var_dump($data);
        //die();
        //return a view
        return $this->render('sponsor/frontSponsor.html.twig', array(
            //data
            'liste' => $data
        ));
    }

    //Add method

    /**
     * @Route("/sponsorNew",name="newSponsorPage")
     */
    public function newSponsor(Request $req): Response
    {
        //1.Create form view
        $sponsor = new Sponsor();
        //1.b prepare the form
        $form = $this->createForm(SponsorType::class, $sponsor);
        //2. Handel http request sent by the user
        $form = $form->handleRequest($req);
        //2.b check the form
        if ($form->isSubmitted() && $form->isValid()) {
            //3.Persist data
            $em = $this->getDoctrine()->getManager();
            $em->persist($sponsor);
            $em->flush();
            return $this->redirectToRoute("SponsorListPage");
        }
        //1.c render the form
        return $this->render('sponsor/new.html.twig', [
            'f' => $form->createView()
        ]);
    }


    /**
     * @Route("/deleteSponsor/{id_sponsor}",name="deleteSponsorPage")
     */
    public function deleteSponsor($id_sponsor): Response
    {

        $em = $this->getDoctrine()->getManager();
        //prepare the object
        $object = $em->getRepository(Sponsor::class)
            ->find($id_sponsor);
        $em->remove($object);
        $em->flush();
        return $this->redirectToRoute("SponsorListPage");
    }

    /**
     * @Route("/update/{id_sponsor}",name="UpdateSponsorPage")
     */
    public function updateSponsor($id_sponsor, Request $request): Response
    {
        //1.Create form view
        //1.a prepare an instance of the sponsor
        $em = $this->getDoctrine()->getManager();
        //prepare the object
        $sponsor = $em->getRepository(Sponsor::class)
            ->find($id_sponsor);

        //1.b prepare the form
        $form = $this->createForm(SponsorType::class, $sponsor);
        //2. Handel http request sent by the user
        $form = $form->handleRequest($request);
        //2.b check the form
        if ($form->isSubmitted() && $form->isValid()) {
            //3.Persist data
            $em = $this->getDoctrine()->getManager();

            $em->flush();
            return $this->redirectToRoute("SponsorListPage");
        }
        //1.c render the form
        return $this->render('sponsor/new.html.twig', [
            'f' => $form->createView()
        ]);
    }

    /**
     * @Route("/s/searchT", name="searchT")
     */
    public function searchArticles(Request $request, NormalizerInterface $Normalizer, SponsorRepository $repository): Response
    {
//$repository = $this->getDoctrine()->getRepository(Article::class);
        $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        $requestString = $request->get('searchValue');
        $tournois = $repository->findBynom($requestString);
        $jsonContent = $serializer->serialize($tournois, 'json', [
            'circular_reference_handler' => function ($object) {
                return $object->getIdSponsor();
            }]);

        return new Response($jsonContent);
    }
}
