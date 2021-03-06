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

namespace Elcodi\UserBundle\DependencyInjection;

use Elcodi\CoreBundle\DependencyInjection\Abstracts\AbstractExtension;
use Elcodi\CoreBundle\DependencyInjection\Interfaces\EntitiesOverridableExtensionInterface;

/**
 * This class loads and manages your bundle configuration
 */
class ElcodiUserExtension extends AbstractExtension implements EntitiesOverridableExtensionInterface
{
    /**
     * Get the Config file location
     *
     * @return string Config file location
     */
    public function getConfigFilesLocation()
    {
        return __DIR__ . '/../Resources/config';
    }

    /**
     * Config files to load
     *
     * @param array $config Configuration
     *
     * @return array Config files
     */
    public function getConfigFiles(array $config)
    {
        return [
            'classes',
            'eventListeners',
            'services',
            'factories',
            'repositories',
            'wrappers',
            'providers',
        ];
    }

    /**
     * @return array
     */
    public function getEntitiesOverrides()
    {
        return [
            'Elcodi\UserBundle\Entity\Interfaces\CustomerInterface' => 'elcodi.core.user.entity.customer.class',
            'Elcodi\UserBundle\Entity\Interfaces\AdminUserInterface' => 'elcodi.core.user.entity.admin_user.class',
        ];
    }
}
