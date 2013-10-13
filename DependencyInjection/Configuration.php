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
                ->append($this->createFFMpegNode('audio'))
                ->append($this->createFFMpegNode('video'))
            ->end();

        return $treeBuilder;
    }

    private function createFFMpegNode($name)
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root($name);

        $node
            ->treatNullLike(false)
            ->treatFalseLike(array('enabled' => false, 'ffmpeg' => false))
            ->treatTrueLike(array('enabled' => true, 'ffmpeg' => true))
            ->beforeNormalization()
                ->ifArray()
                ->then(
                    function ($v) {
                        if ($v['enabled'] && !isset($v['ffmpeg'])) {
                            return array('enabled' => true, 'ffmpeg' => true);
                        }

                        return $v;
                    }
                )
            ->end()
            ->addDefaultsIfNotSet()
            ->children()
                ->booleanNode('enabled')->defaultFalse()->end()
                ->booleanNode('ffmpeg')->defaultFalse()->end()
            ->end();

        return $node;
    }
}
