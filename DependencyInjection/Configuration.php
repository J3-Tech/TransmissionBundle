<?php

namespace Transmission\Bundle\TransmissionBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $rootNode = $treeBuilder->root('transmission');
        $rootNode
            ->children()
                ->scalarNode('host')->defaultValue('localhost')->end()
                ->scalarNode('port')->defaultValue('9091')->end()
                ->scalarNode('path')->defaultValue(null)->end()
                ->scalarNode('username')->defaultValue(null)->end()
                ->scalarNode('password')->defaultValue(null)->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
