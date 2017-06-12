<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Booking;
use AppBundle\Entity\Customer;
use AppBundle\Form\CustomerFormType;
use Doctrine\ORM\EntityNotFoundException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="front_homepage")
     */
    public function indexAction()
    {
        return $this->render(':frontend:index.html.twig');
    }

    /**
     * @Route("/reserva/{day}/{month}/{year}", name="front_booking")
     *
     * @param Request $request
     * @param int     $day
     * @param int     $month
     * @param int     $year
     *
     * @return Response
     *
     * @throws EntityNotFoundException
     */
    public function bookingAction(Request $request, $day, $month, $year)
    {
        $startDay = new \DateTime();
        $startDay->setDate($year, $month, $day);
        $previousBooking = $this->getDoctrine()->getRepository('AppBundle:Booking')->findBookingByStartDay($startDay);

        if ($previousBooking) {
            $this->addFlash(
                'error',
                'Ja existeix una reserva amb el mateix dia'
            );

            return $this->redirectToRoute('front_homepage');
        }

        $customer = new Customer();
        $form = $this->createForm(CustomerFormType::class, $customer);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Set frontend flahs message
            $this->addFlash(
                'notice',
                'La teva reserva s\'ha realitzat exitosament'
            );

            $booking = new Booking();
            $booking
                ->setStart($startDay)
                ->setEnd($startDay)
                ->setItem($this->getDoctrine()->getRepository('AppBundle:Room')->getLaCarrovaRoom())
            ;
            $customer->setBooking($booking);
            // Persist new booking into DB
            $em = $this->getDoctrine()->getManager();
            $em->persist($customer);
            $em->flush();
            // Clean up new form in production envioronment
            if ($this->get('kernel')->getEnvironment() == 'prod') {
                $customer = new Customer();
                $form = $this->createForm(CustomerFormType::class, $customer);
            }

//            return $this->redirectToRoute('front_homepage'); // Todo redirect to last step form
        }

        return $this->render(':frontend:booking.html.twig', [
            'day' => $day,
            'month' => $month,
            'year' => $year,
            'bookingForm' => $form->createView(),
        ]);
    }
}
