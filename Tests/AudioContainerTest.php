<?php

namespace Toa\Bundle\ValidatorBundle\Tests;

/**
 * AudioContainerTest
 *
 * @author Enrico Thies <enrico.thies@gmail.com>
 */
class AudioContainerTest extends ContainerTest
{
    /**
     * @test
     */
    public function testAudioNullConfiguration()
    {
        $container = $this->createContainer(array('toa_validator' => array('audio' => null)));

        $this->assertFalse($container->hasDefinition('toa_validator.provider.audio'));
        $this->assertFalse($container->hasDefinition('toa_validator.validator.audio'));
    }

    /**
     * @test
     */
    public function testAudioFalseConfiguration()
    {
        $container = $this->createContainer(array('toa_validator' => array('audio' => null)));

        $this->assertFalse($container->hasDefinition('toa_validator.provider.audio'));
        $this->assertFalse($container->hasDefinition('toa_validator.validator.audio'));
    }

    /**
     * @test
     */
    public function testAudioTrueConfiguration()
    {
        $container = $this->createContainer(array('toa_validator' => array('audio' => true)));

        $this->assertInstanceOf(
            'Toa\Component\Validator\Provider\AudioProviderInterface',
            $container->get('toa_validator.provider.audio')
        );
        $this->assertInstanceOf(
            'Toa\Component\Validator\Constraints\AudioValidator',
            $container->get('toa_validator.validator.audio')
        );
        $this->assertInstanceOf('FFMpeg\FFMpeg', $container->get('toa_validator.helper.ffmpeg'));
    }
}
