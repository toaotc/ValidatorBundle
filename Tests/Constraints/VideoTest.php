<?php

namespace Toa\Bundle\ValidatorBundle\Tests\Constraints;

use Toa\Bundle\ValidatorBundle\Constraints\Video;

/**
 * VideoTest
 *
 * @author Enrico Thies <enrico.thies@gmail.com>
 */
class VideoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testVideo()
    {
        $this->assertInstanceOf('Toa\Component\Validator\Constraints\Video', new Video());
    }

    /**
     * @test
     */
    public function testValidatedBy()
    {
        $constraint = new Video(array('service' => 'foo'));

        $this->assertEquals('foo', $constraint->validatedBy());
    }
}
