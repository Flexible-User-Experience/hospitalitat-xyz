<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Room;
use Doctrine\ORM\EntityRepository;

/**
 * Class RoomRepository.
 *
 * @category Repository
 *
 * @author   Wils Iglesias <wiglesias83@gmail.com>
 */
class RoomRepository extends EntityRepository
{
    /**
     * @return Room|null
     */
    public function getLaCarrovaRoom()
    {
        return $this->createQueryBuilder('r')
            ->where('r.name = :name')
            ->setParameter('name', 'La Carrova')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
