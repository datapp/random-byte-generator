<?php
namespace Datapp\Tool;

use PHPUnit\Framework\TestCase;
use Datapp\Tool\RandomByteGenerator;

/**
 * RandomByteGeneratorTest
 *
 * @author Manuel Dimmler <info@datapp.de>
 */
class RandomByteGeneratorTest extends TestCase
{

    public function testInstantiate()
    {
        $generator = new RandomByteGenerator(6);
        $this->assertInstanceOf('Datapp\Tool\RandomByteGenerator', $generator);
    }

    public function testInstantiateWithoutRequiredArguments()
    {
        $this->expectException('ArgumentCountError');
        $generator = new RandomByteGenerator();
    }
    
    public function testInstantiateWithInvalidArgumentType()
    {
        $this->expectException('InvalidArgumentException');
        $generator = new RandomByteGenerator('test');
    }
    
    public function testInstantiateWithInvalidIntegerSize()
    {
        $this->expectException('InvalidArgumentException');
        $generator = new RandomByteGenerator(0);
    }
    
    public function testGettingRandomString() {
        $generator = new RandomByteGenerator(6);
        $this->assertEquals(6, strlen($generator->getString()));
    }
}
