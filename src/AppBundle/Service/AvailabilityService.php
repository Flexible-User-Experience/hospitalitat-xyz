<?php

namespace AppBundle\Service;

/**
 * Class AvailabilityService.
 *
 * @author Wils Iglesias <wiglesias83@gmail.com>
 */
class AvailabilityService
{
    /**
     * @param \DateTime $date
     *
     * @return bool
     */
    public function check(\DateTime $date)
    {
        $day = new \DateTime();
        $day->setDate(2017, 7, 15);
        if ($date->format('Y-m-d') == $day->format('Y-m-d')) {
            return true;
        }
        $day->setDate(2017, 7, 21);
        if ($date->format('Y-m-d') == $day->format('Y-m-d')) {
            return true;
        }
        $day->setDate(2017, 7, 22);
        if ($date->format('Y-m-d') == $day->format('Y-m-d')) {
            return true;
        }
        $day->setDate(2017, 7, 24);
        if ($date->format('Y-m-d') == $day->format('Y-m-d')) {
            return true;
        }
        $day->setDate(2017, 7, 28);
        if ($date->format('Y-m-d') == $day->format('Y-m-d')) {
            return true;
        }
        $day->setDate(2017, 7, 29);
        if ($date->format('Y-m-d') == $day->format('Y-m-d')) {
            return true;
        }
        $day->setDate(2017, 8, 4);
        if ($date->format('Y-m-d') == $day->format('Y-m-d')) {
            return true;
        }
        $day->setDate(2017, 8, 5);
        if ($date->format('Y-m-d') == $day->format('Y-m-d')) {
            return true;
        }
        $day->setDate(2017, 8, 11);
        if ($date->format('Y-m-d') == $day->format('Y-m-d')) {
            return true;
        }
        $day->setDate(2017, 8, 12);
        if ($date->format('Y-m-d') == $day->format('Y-m-d')) {
            return true;
        }
        $day->setDate(2017, 8, 14);
        if ($date->format('Y-m-d') == $day->format('Y-m-d')) {
            return true;
        }

        return false;
    }
}
