<?php

namespace AppBundle\Service;

use AppBundle\Entity\Customer;

/**
 * Class NotificationService.
 *
 * @category Service
 *
 * @author   David Romaní <david@flux.cat>
 */
class NotificationService
{
    /**
     * @var CourierService
     */
    private $messenger;

    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @var string
     */
    private $amd;

    /**
     * @var string
     */
    private $urlBase;

    /**
     * Methods.
     */

    /**
     * NotificationService constructor.
     *
     * @param CourierService    $messenger
     * @param \Twig_Environment $twig
     * @param string            $amd
     * @param string            $urlBase
     */
    public function __construct(CourierService $messenger, \Twig_Environment $twig, $amd, $urlBase)
    {
        $this->messenger = $messenger;
        $this->twig = $twig;
        $this->amd = $amd;
        $this->urlBase = $urlBase;
    }

    /**
     * Send a common notification mail to frontend user.
     *
     * @param Customer $customer
     */
    public function sendCustomerNotification(Customer $customer)
    {
        $this->messenger->sendEmail(
            $this->amd,
            $customer->getEmail(),
            'Confirmació de reserva '.$this->urlBase,
            $this->twig->render(':mails:user_notification.html.twig', array(
                'customer' => $customer,
            ))
        );
    }

    /**
     * Send a common notification mail to frontend user.
     *
     * @param Customer $customer
     */
    public function sendAdminNotification(Customer $customer)
    {
        $this->messenger->sendEmail(
            $this->amd,
            $this->amd,
            'Confirmació de reserva '.$this->urlBase,
            $this->twig->render(':mails:admin_notification.html.twig', array(
                'customer' => $customer,
            ))
        );
    }
}
