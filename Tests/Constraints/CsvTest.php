<?php

namespace Toa\Bundle\ValidatorBundle\Tests\Constraints;

use Toa\Bundle\ValidatorBundle\Constraints\Csv;

/**
 * CsvTest
 *
 * @author Enrico Thies <enrico.thies@gmail.com>
 */
class CsvTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testCsv()
    {
        $this->assertInstanceOf('Toa\Component\Validator\Constraints\Csv', new Csv());
    }

    /**
     * @test
     */
    public function testValidatedBy()
    {
        $constraint = new Csv(array('service' => 'foo'));

        $this->assertEquals('foo', $constraint->validatedBy());
    }
}
