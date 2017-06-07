<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Kami\BookingBundle\Entity\Booking as BaseClass;

/**
 * Class Booking
 *
 * @category Entity
 * @package  AppBundle\Entity
 * @author   Wils Iglesias <wiglesias83@gmail.com
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BookingRepository")
 * @ORM\Table(name="booking")
 */
class Booking extends BaseClass
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Room
     *
     * @ORM\ManyToOne(targetEntity="Room", inversedBy="bookings")
     * @ORM\JoinColumn(name="property_id", referencedColumnName="id")
     */
    protected $item;

    /**
     *
     * Methods.
     *
     */

    /**
     * @return Room
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param Room $item
     * @return Booking
     */
    public function setItem($item)
    {
        $this->item = $item;
        return $this;
    }
}
