<?php

/**
 * This file is part of the Elcodi package.
 *
 * Copyright (c) 2014 Elcodi.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @author Aldo Chiecchia <zimage@tiscali.it>
 */

namespace Elcodi\UserBundle\Services;

use Elcodi\GeoBundle\Entity\Interfaces\AddressInterface;
use Elcodi\UserBundle\ElcodiUserEvents;
use Elcodi\UserBundle\Entity\Interfaces\AbstractUserInterface;
use Elcodi\UserBundle\Entity\Interfaces\CustomerInterface;
use Elcodi\UserBundle\Event\CustomerRegisterEvent;
use Elcodi\UserBundle\Services\Abstracts\AbstractUserManager;

/**
 * Manager for Customer entities
 */
class CustomerManager extends AbstractUserManager
{
    /**
     * Register new User into the web.
     * Creates new token given a user, with related Role set.
     *
     * @param AbstractUserInterface $user        User to register
     * @param string                $providerKey Provider key
     *
     * @return AbstractUserManager self Object
     */
    public function register(AbstractUserInterface $user, $providerKey)
    {
        parent::register($user, $providerKey);

        $event = new CustomerRegisterEvent($user);
        $this->eventDispatcher->dispatch(
            ElcodiUserEvents::CUSTOMER_REGISTER,
            $event
        );

        return $this;
    }

    /**
     * Check if customer has a valid delivery address
     *
     * @param CustomerInterface $customer
     *
     * @return bool Customer has correct delivery address
     */
    public function customerHasCorrectDeliveryAddress(CustomerInterface $customer)
    {
        if (($customer->getDeliveryAddress() instanceof AddressInterface)
            && ($customer->getDeliveryAddress()->getAddress())
        ) {
            return true;
        }

        return false;
    }
}
