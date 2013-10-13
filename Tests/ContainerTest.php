<?php

namespace Toa\Bundle\ValidatorBundle\Tests;

use Symfony\Bundle\FrameworkBundle\DependencyInjection\FrameworkExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Toa\Bundle\ValidatorBundle\DependencyInjection\ToaValidatorExtension;

/**
 * ContainerTest
 *
 * @author Enrico Thies <enrico.thies@gmail.com>
 */
abstract class ContainerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param array $data
     *
     * @return \Symfony\Component\DependencyInjection\ContainerBuilder
     */
    protected function createContainer(array $data = array())
    {
        $container = new ContainerBuilder(
            new ParameterBag(
                array(
                    'kernel.bundles'     => array(
                        'ToaValidatorBundle' => 'Toa\\Bundle\\ValidatorBundle\\ToaValidatorBundle'
                    ),
                    'kernel.cache_dir'   => __DIR__,
                    'kernel.debug'       => false,
                    'kernel.environment' => 'test',
                    'kernel.root_dir'    => __DIR__,
                )
            )
        );

        $extension = new ToaValidatorExtension();
        $container->registerExtension($extension);
        $extension->load($data, $container);

        $container->getCompilerPassConfig()->setOptimizationPasses(array());
        $container->getCompilerPassConfig()->setRemovingPasses(array());
        $container->compile();

        return $container;
    }
}
