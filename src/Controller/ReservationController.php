<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Reservation;
use App\Form\ReservationType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ReservationRepository;

class ReservationController extends AbstractController
{

    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        return $this->redirectToRoute('app_login');
    }
    /**
     * @Route("/reservation", name="app_reservation")
     */
    public function makeReservation(Request $request, EntityManagerInterface $em): Response
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $reservation->setEtudiant($this->getUser());
            $em->persist($reservation);
            $em->flush();

            $this->addFlash(
                'notice',
                'Réservation crée avec succes!'
            );
            return $this->redirectToRoute('app_checkout');
        }

        return $this->render('reservation/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/histo_reservations", name="histo_reservations")
     */
    public function list(ReservationRepository $reservationRepository): Response
    {
        $user_id = $this->getUser()->getId();
        $reservations = $reservationRepository->findtheLatestReservations($user_id);
        return $this->render('reservation/list.html.twig', [
            'reservations' => $reservations,
        ]);
    }
}
