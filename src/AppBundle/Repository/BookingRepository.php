<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class BookingRepository.
 *
 * @category Repository
 *
 * @author   Wils Iglesias <wiglesias83@gmail.com>
 */
class BookingRepository extends EntityRepository
{
    public function findBookingByStartDay(\DateTime $startDay)
    {
    }
}
