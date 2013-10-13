<?php

namespace Toa\Bundle\ValidatorBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class ToaValidatorExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        if ($config['csv']) {
            $loader->load('csv.xml');
        }

        if ($config['audio']['ffmpeg'] || $config['video']['ffmpeg']) {
            $loader->load('ffmpeg.xml');
        }

        if ($config['audio']['enabled']) {
            $loader->load('audio.xml');
        }

        if ($config['video']['enabled']) {
            $loader->load('video.xml');
        }
    }
}
