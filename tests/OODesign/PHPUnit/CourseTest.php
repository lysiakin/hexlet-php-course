<?php

namespace Test\OODesign\PHPUnit;

use OODesign\PHPUnit\Course;
use PHPUnit\Framework\TestCase;
use function Php\Immutable\Fs\Trees\trees\getName;

class CourseTest extends TestCase
{
    public function testGetName()
    {
        $name = 'Dima';
        $course = new Course($name);

        $this->assertEquals($name, $course->getName());
        $this->assertEquals(4, strlen($name));
    }
}