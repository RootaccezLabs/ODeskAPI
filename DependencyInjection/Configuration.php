<?php

namespace RootAccez\OdeskapiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface {

    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder() {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('rootaccez_odeskapi');

        $rootNode->children()
                ->scalarNode('key')
                ->end()
                ->scalarNode('secret')
                ->end()
                ->end();

        return $treeBuilder;
    }

}
