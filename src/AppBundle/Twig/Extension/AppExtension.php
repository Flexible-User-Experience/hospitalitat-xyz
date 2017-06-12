<?php

namespace AppBundle\Twig\Extension;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Routing\RouterInterface;

/**
 * Class AppExtension.
 *
 *
 * @author  Wils Iglesias <wiglesias83@gmail.com>
 */
class AppExtension extends \Twig_Extension
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * AppExtension constructor.
     *
     * @param EntityManager   $em
     * @param RouterInterface $router
     */
    public function __construct(EntityManager $em, RouterInterface $router)
    {
        $this->em = $em;
        $this->router = $router;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('drawTdAvailavility', array($this, 'drawTdAvailavilityFunction')),
        );
    }

    /**
     * @param int $day
     * @param int $month
     * @param int $year
     *
     * @return string
     */
    public function drawTdAvailavilityFunction($day, $month, $year)
    {
        $startDay = new \DateTime();
        $startDay->setDate($year, $month, $day);
        $booking = $this->em->getRepository('AppBundle:Booking')->findBookingByStartDay($startDay);
        if ($booking) {
            return '<td class="ui inverted red table">'.$day.'</td>';
        }

        return '<td class="ui inverted green table"><a href="'.$this->router->generate('front_booking', ['day' => $day, 'month' => $month, 'year' => $year]).'">'.$day.'</a></td>';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'app_extension';
    }
}
