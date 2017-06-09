<?php

namespace AppBundle\Controller;

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
        return $this->render(':frontend:booking.html.twig', [
            'day' => $day,
            'month' => $month,
            'year' => $year,
        ]);
    }
}
