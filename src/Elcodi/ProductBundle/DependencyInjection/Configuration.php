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

namespace Elcodi\ProductBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('elcodi_product');

        $rootNode
            ->children()
                ->arrayNode('categories')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('load_only_categories_with_products')
                            ->defaultFalse()
                        ->end()
                        ->scalarNode('cache_key')
                            ->defaultValue('categories')
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
