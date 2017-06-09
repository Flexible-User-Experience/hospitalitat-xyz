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
            new \Twig_SimpleFunction('checkAvailability', array($this, 'checkAvailabilityFunction')),
        );
    }

    /**
     * @param int $day
     * @param int $month
     * @param int $year
     *
     * @return string
     */
    public function checkAvailabilityFunction($day, $month, $year)
    {
        $startDay = new \DateTime();
        $booking = $this->em->getRepository('AppBundle:Booking')->findBookingByStartDay($startDay);
        if ($booking) {
            return 'ui inverted red table';
        }

        return 'ui inverted green table';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'app_extension';
    }
}
