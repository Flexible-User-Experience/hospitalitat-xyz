<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Booking;
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
    /**
     * @param \DateTime $startDay
     *
     * @return Booking|null
     */
    public function findBookingByStartDay(\DateTime $startDay)
    {
        $query = $this->createQueryBuilder('b')
            ->where('b.start = :day')
            ->setParameter('day', $startDay->format('Y-m-d'))
            ->setMaxResults(1)
            ->getQuery();

        return $query->getOneOrNullResult();
    }
}
