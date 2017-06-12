<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;

/**
 * Class BookingService.
 *
 *
 * @author  Wils Iglesias <wiglesias83@gmail.com>
 */
class BookingService
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * Methods.
     */

    /**
     * BookingService constructor.
     *
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
}
