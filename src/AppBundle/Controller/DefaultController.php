<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Customer;
use AppBundle\Form\CustomerType;
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
     */
    public function bookingAction(Request $request, $day, $month, $year)
    {
        $booking = new Customer();
        $form = $this->createForm(CustomerType::class, $booking);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Set frontend flahs message
            $this->addFlash(
                'notice',
                'La teva reserva s\'ha realitzat exitosament'
            );
            // Persist new booking into DB
            $em = $this->getDoctrine()->getManager();
            $em->persist($booking);
            $em->flush();
            // Clean up new form in production envioronment
            if ($this->get('kernel')->getEnvironment() == 'prod') {
                $booking = new CustomerType();
                $form = $this->createForm(CustomerType::class, $booking);
            }
        }

        return $this->render(':frontend:booking.html.twig', [
            'day' => $day,
            'month' => $month,
            'year' => $year,
            'bookingForm' => $form->createView(),
        ]);
    }
}
