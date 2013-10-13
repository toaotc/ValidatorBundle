<?php

namespace Toa\Bundle\ValidatorBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('toa_validator');

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->booleanNode('csv')->treatNullLike(false)->defaultFalse()->end()
                ->booleanNode('audio')->treatNullLike(false)->defaultFalse()->end()
                ->booleanNode('video')->treatNullLike(false)->defaultFalse()->end()
            ->end();

        return $treeBuilder;
    }
}
