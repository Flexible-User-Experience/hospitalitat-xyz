<?php

namespace AppBundle\Twig\Extension;

use Doctrine\ORM\EntityManager;

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
     * AppExtension constructor.
     *
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
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

        return '<td class="ui inverted green table"><a href="">'.$day.'</a></td>';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'app_extension';
    }
}
