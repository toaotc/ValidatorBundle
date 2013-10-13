<?php

namespace Toa\Bundle\ValidatorBundle\Tests;

/**
 * VideoContainerTest
 *
 * @author Enrico Thies <enrico.thies@gmail.com>
 */
class VideoContainerTest extends ContainerTest
{
    /**
     * @test
     */
    public function testVideoNullConfiguration()
    {
        $container = $this->createContainer(array('toa_validator' => array('video' => null)));

        $this->assertFalse($container->hasDefinition('toa_validator.provider.video'));
        $this->assertFalse($container->hasDefinition('toa_validator.validator.video'));
    }

    /**
     * @test
     */
    public function testVideoFalseConfiguration()
    {
        $container = $this->createContainer(array('toa_validator' => array('video' => null)));

        $this->assertFalse($container->hasDefinition('toa_validator.provider.video'));
        $this->assertFalse($container->hasDefinition('toa_validator.validator.video'));
    }

    /**
     * @test
     */
    public function testVideoTrueConfiguration()
    {
        $container = $this->createContainer(array('toa_validator' => array('video' => true)));

        $this->assertInstanceOf('Toa\Component\Validator\Provider\VideoProviderInterface', $container->get('toa_validator.provider.video'));
        $this->assertInstanceOf('Toa\Component\Validator\Constraints\VideoValidator', $container->get('toa_validator.validator.video'));
        $this->assertInstanceOf('FFMpeg\FFMpeg', $container->get('toa_validator.helper.ffmpeg'));
    }

    /**
     * @test
     */
    public function testVideoEnabledTrueConfiguration()
    {
        $container = $this->createContainer(array('toa_validator' => array('video' => array('enabled' => true))));

        $this->assertInstanceOf('Toa\Component\Validator\Provider\VideoProviderInterface', $container->get('toa_validator.provider.video'));
        $this->assertInstanceOf('Toa\Component\Validator\Constraints\VideoValidator', $container->get('toa_validator.validator.video'));
        $this->assertInstanceOf('FFMpeg\FFMpeg', $container->get('toa_validator.helper.ffmpeg'));
    }

    /**
     * @test
     */
    public function testVideoEnabledFalseConfiguration()
    {
        $container = $this->createContainer(array('toa_validator' => array('video' => array('enabled' => false))));

        $this->assertFalse($container->hasDefinition('toa_validator.provider.video'));
        $this->assertFalse($container->hasDefinition('toa_validator.validator.video'));
    }
}
