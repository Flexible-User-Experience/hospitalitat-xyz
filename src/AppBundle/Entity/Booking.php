<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Kami\BookingBundle\Entity\Booking as BaseClass;

/**
 * Class Booking.
 *
 * @category Entity
 *
 * @author   Wils Iglesias <wiglesias83@gmail.com
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BookingRepository")
 * @ORM\Table(name="booking")
 */
class Booking extends BaseClass
{
    /**
     * @var int
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
     * @var string
     * @ORM\Column(type="string", nullable=false, length=4)
     */
    protected $code;

    /**
     * Methods.
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
     *
     * @return Booking
     */
    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return Booking
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getStart()->format('d/m/Y').' · '.$this->getCode();
    }
}
