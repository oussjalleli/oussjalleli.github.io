<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Form\EvenementType;
use App\Repository\EvenementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class EvenementController extends AbstractController
{
  /**
   * @Route("/Event", name="app_evenement")
   */
  public function index(): Response
  {
    return $this->render('evenement/calendar.html.twig', [
      'controller_name' => 'EvenementController',
    ]);
  }

  /**
   * @Route("/listEvent",name="EventListPage")
   */
  public function listEvents(): Response
  {
    $list = $this->getDoctrine()
      ->getRepository(Evenement::class)
      ->findAll();
    return $this->render('evenement/index.html.twig',
      array(
        'list' => $list
      ));
  }

  /**
   * @Route("/frontEvent",name="frontEventPage")
   */
  public function frontEvents(): Response
  {
    $list = $this->getDoctrine()
      ->getRepository(Evenement::class)
      ->findAll();
    return $this->render('evenement/frontEvent.html.twig',
      array(
        'list' => $list
      ));
  }

  //Add method

  /**
   * @Route("/eventNew",name="newEventPage")
   */
  public function newEvent(Request $req): Response
  {
    //1.Create form view
    $evenement = new Evenement();
    //1.b prepare the form
    $form = $this->createForm(EvenementType::class, $evenement);
    //2. Handel http request sent by the user
    $form = $form->handleRequest($req);
    //2.b check the form
    if ($form->isSubmitted() && $form->isValid()) {
      //3.Persist data
      $file = $form->get('imageEvent')->getData();
      $filename = md5(uniqid()) . '.' . $file->guessExtension();
      $file->move($this->getParameter('uploads_directory'), $filename);
      $evenement->setimageEvent($file);


      $em = $this->getDoctrine()->getManager();
      $em->persist($evenement);
      $em->flush();
      return $this->redirectToRoute("EventListPage");
    }
    //1.c render the form
    return $this->render('evenement/newEvent.html.twig', [
      'e' => $form->createView()
    ]);
  }


  /**
   * @Route("/deleteEvent/{id_evenement}",name="deleteEventPage")
   */
  public function deleteEvent($id_evenement): Response
  {

    $em = $this->getDoctrine()->getManager();
    //prepare the object
    $object = $em->getRepository(Evenement::class)
      ->find($id_evenement);
    $em->remove($object);
    $em->flush();
    return $this->redirectToRoute("EventListPage");
  }

  /**
   * @Route("/updateEvent/{id_evenement}",name="UpdateEventPage")
   */
  public function updateEvent($id_evenement, Request $request): Response
  {
    //1.Create form view
    //1.a prepare an instance of the sponsor
    $em = $this->getDoctrine()->getManager();
    //prepare the object
    $evenement = $em->getRepository(Evenement::class)
      ->find($id_evenement);

    //1.b prepare the form
    $form = $this->createForm(EvenementType::class, $evenement);
    //2. Handel http request sent by the user
    $form = $form->handleRequest($request);
    //2.b check the form
    if ($form->isSubmitted() && $form->isValid()) {
      //3.Persist data
      $em = $this->getDoctrine()->getManager();

      $em->flush();
      return $this->redirectToRoute("EventListPage");
    }
    //1.c render the form
    return $this->render('evenement/newEvent.html.twig', [
      'e' => $form->createView()
    ]);
  }

  /**
   * @Route("/dateSearch", name="dateSearch")
   */
  public function searchAction(Request $request)
  {
    $defaultData = [];
    $debits= new Evenement();
    $form = $this->createFormBuilder($defaultData)
      ->add('from', DateType::class, [
        'widget' => 'single_text',
        'format' => 'yyyy-MM-dd',
        'attr' => [
          'class' => 'datepicker'
        ]
      ])
      ->add('to', DateType::class, [
        'widget' => 'single_text',
        'format' => 'yyyy-MM-dd',
        'attr' => [
          'class' => 'datepicker2'
        ]])
      ->add('submit', SubmitType::class)
      ->getForm();
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $em = $this->getDoctrine()->getManager()->getRepository(Evenement::class);


      $from = $form['from']->getData();
      var_dump($from);
      $to = $form['to']->getData();
      $debits = $em->getByDate($from, $to);

    }
    return $this->render('evenement/index.html.twig', ['list' => $form->createView()]);
  }

}
