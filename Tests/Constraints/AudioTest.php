<?php

namespace Toa\Bundle\ValidatorBundle\Tests\Constraints;

use Toa\Bundle\ValidatorBundle\Constraints\Audio;

/**
 * AudioTest
 *
 * @author Enrico Thies <enrico.thies@gmail.com>
 */
class AudioTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testAudio()
    {
        $this->assertInstanceOf('Toa\Component\Validator\Constraints\Audio', new Audio());
    }

    /**
     * @test
     */
    public function testValidatedBy()
    {
        $constraint = new Audio(array('service' => 'foo'));

        $this->assertEquals('foo', $constraint->validatedBy());
    }
}
