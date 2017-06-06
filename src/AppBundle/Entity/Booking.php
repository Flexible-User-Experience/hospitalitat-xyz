<?php

namespace AppBundle\Entity;

use Kami\BookingBundle\Entity\Booking as BaseClass;

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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Booking
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

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
