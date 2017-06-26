<?php

namespace AppBundle\Service;

/**
 * Class AvailabilityService.
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
        if ($date == $day) {
            return true;
        }
        $day->setDate(2017, 7, 21);
        if ($date == $day) {
            return true;
        }
        $day->setDate(2017, 7, 22);
        if ($date == $day) {
            return true;
        }
        $day->setDate(2017, 7, 24);
        if ($date == $day) {
            return true;
        }
        $day->setDate(2017, 7, 28);
        if ($date == $day) {
            return true;
        }
        $day->setDate(2017, 7, 29);
        if ($date == $day) {
            return true;
        }
        $day->setDate(2017, 8, 4);
        if ($date == $day) {
            return true;
        }
        $day->setDate(2017, 8, 5);
        if ($date == $day) {
            return true;
        }
        $day->setDate(2017, 8, 11);
        if ($date == $day) {
            return true;
        }
        $day->setDate(2017, 8, 12);
        if ($date == $day) {
            return true;
        }
        $day->setDate(2017, 8, 14);
        if ($date == $day) {
            return true;
        }

        return false;
    }
}
