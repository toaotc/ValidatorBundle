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
class ContainerTest extends \PHPUnit_Framework_TestCase
{
    /** @var ContainerBuilder */
    protected $container;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
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
        $extension->load(array(), $container);

        $container->getCompilerPassConfig()->setOptimizationPasses(array());
        $container->getCompilerPassConfig()->setRemovingPasses(array());
        $container->compile();

        $this->container = $container;
    }

    /**
     * @test
     */
    public function testContainer()
    {
        $this->assertInstanceOf(
            'Toa\Component\Validator\Provider\GoodbyCsvProvider',
            $this->container->get('toa_validator.provider.csv')
        );

        $this->assertInstanceOf(
            'Toa\Component\Validator\Constraints\CsvValidator',
            $this->container->get('toa_validator.validator.csv')
        );
    }
}
