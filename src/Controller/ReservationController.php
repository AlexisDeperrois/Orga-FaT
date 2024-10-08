<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use App\Repository\TableRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/')]
final class ReservationController extends AbstractController
{
    #[Route(name: 'app_reservation_index', methods: ['GET'])]
    public function index(ReservationRepository $reservationRepository): Response
    {
        return $this->render('reservation/index.html.twig', [
            'reservations' => $reservationRepository->findBy([],['Name'=> 'ASC','firstname'=>'ASC']),
        ]);
    }


    #[Route('/plan', name: 'app_reservation_plan', methods: ['GET'])]
    public function plan(ReservationRepository $reservationRepository, TableRepository $tableRepository): Response
    {   
        $reservationWithPlace =[];
        $reservationWithoutPlace = [];

        $reservations = $reservationRepository->findAll();
        foreach($reservations as $reservation){
            if($reservation->getInscriptionCheckedDate()){
                if(count($reservation->getEmplacement())< 0 ){
                    $reservationWithPlace[] = $reservation;
                }else{
                    $reservationWithoutPlace[] = $reservation;
                }  
            }
                 
        }

        return $this->render('reservation/plan.html.twig', [
            // 'reservationWithPlace' => $reservationRepository->findBy(['emplacement'=>!null],['Name'=>'ASC', 'firstname'=>'ASC']),
            'tables'=>$tableRepository->findAll(),
            'reservationsWithoutPlace' => $reservationWithoutPlace,
            'reservationsWithPlace' => $reservationWithPlace,
        ]);
    }

    #[Route('/new', name: 'app_reservation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reservation);
            $entityManager->flush();

            return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reservation/new.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
        ]);
    }


    #[Route('/{id}/edit', name: 'app_reservation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reservation/edit.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reservation_delete', methods: ['POST'])]
    public function delete(Request $request, Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservation->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($reservation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_reservation_index', [], Response::HTTP_SEE_OTHER);
    }
}
