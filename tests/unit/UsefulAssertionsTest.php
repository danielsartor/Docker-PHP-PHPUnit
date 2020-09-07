<?php

declare(strict_types=1);

namespace Tests\Unit;

use \PHPUnit\Framework\TestCase;

class UsefulAssertionsTest extends TestCase {

    /**
     * @covers App
     */
    public function testAssertSame()
    {
        $expected = 'foo';
        $result = 'foo';
        $this->assertSame($expected, $result); // Compare Values AND Types
    }

    /**
     * @covers App
     */
    public function testAssertEquals()
    {
        $expected = '1';
        $result = 1;
        $this->assertEquals($expected, $result); // Compare only Values
    }

    /**
     * @covers App
     */
    public function testAssertEmpty()
    {
        $this->assertEmpty([]); // Array
    }

    /**
     * @covers App
     */
    public function testAssertNull()
    {
        $this->assertNull(null); // Any data type
    }

    /**
     * @covers App
     */
    public function testAssertGreaterThan()
    {
        $expected = 1;
        $result = 2;
        $this->assertGreaterThan($expected, $result); // Numbers
    }

    /**
     * @covers App
     */
    public function testAssertFalse()
    {
        $this->assertFalse(false);
    }

    /**
     * @covers App
     */
    public function testAssertTrue()
    {
        $this->assertTrue(true);
    }

    /**
     * @covers App
     */
    public function testAssertCount()
    {
        $this->assertCount(2, [1, 2]); // Matches size of array
    }

    /**
     * @covers App
     */
    public function testAssertContains()
    {
        $this->assertContains(3, [1, 2, 3]); // Value in array
    }

    /**
     * @covers App
     */
    public function testAssertStringContainsString()
    {
        $searchFor = 'foo';
        $searchIn = 'foobar';
        $this->assertStringContainsString($searchFor, $searchIn); // String exists in String
    }

    /**
     * @covers App
     */
    public function testAssertInstanceOf()
    {
        $this->assertInstanceOf(\Exception::class, new \Exception); // If Exception is an instance of RuntimeException
    }

    /**
     * @covers App
     */
    public function testAssertArrayHasKey()
    {
        $this->assertArrayHasKey('foo', ['foo' => 'bar']); // Key in array
    }

    /**
     * @covers App
     */
    public function testAssertDirectoryIsWritable()
    {
        $this->assertDirectoryIsWritable(__DIR__);
    }

    /**
     * @covers App
     */
    public function testAssertFileIsWritable()
    {
        $this->assertFileIsWritable(__FILE__);
    }
}