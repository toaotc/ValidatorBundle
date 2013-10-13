<?php

namespace Toa\Bundle\ValidatorBundle\Tests;

/**
 * CsvContainerTest
 *
 * @author Enrico Thies <enrico.thies@gmail.com>
 */
class CsvContainerTest extends ContainerTest
{
    /**
     * @test
     */
    public function testCsvNullConfiguration()
    {
        $container = $this->createContainer(array('toa_validator' => array('csv' => null)));

        $this->assertFalse($container->hasDefinition('toa_validator.provider.csv'));
        $this->assertFalse($container->hasDefinition('toa_validator.validator.csv'));
    }

    /**
     * @test
     */
    public function testCsvFalseConfiguration()
    {
        $container = $this->createContainer(array('toa_validator' => array('csv' => false)));

        $this->assertFalse($container->hasDefinition('toa_validator.provider.csv'));
        $this->assertFalse($container->hasDefinition('toa_validator.validator.csv'));
    }

    /**
     * @test
     */
    public function testCsvTrueConfiguration()
    {
        $container = $this->createContainer(array('toa_validator' => array('csv' => true)));

        $this->assertInstanceOf('Toa\Component\Validator\Provider\CsvProviderInterface', $container->get('toa_validator.provider.csv'));
        $this->assertInstanceOf('Toa\Component\Validator\Constraints\CsvValidator', $container->get('toa_validator.validator.csv'));
    }
}
