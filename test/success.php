<?php

use funphp as f;

class Success extends \PHPUnit_Framework_TestCase
{
    public function testEach()
    {
        $input  = [1, 2, 3];
        $output = [];

        f\each($input, function ($v) use (&$output) {
            $output[] = $v + 1;
        });

        $this->assertEquals([2, 3, 4], $output);
    }

    public function testMap()
    {
        $input = [1, 2, 3];

        $output = iterator_to_array(f\map($input, function ($v) {
            return $v * 2;
        }));

        $this->assertEquals([2, 4, 6], $output);
    }

    public function testFilter()
    {
        $input = [1, 2, 3, 4, 5];

        $output = iterator_to_array(f\filter($input, function ($v) {
            return $v & 1;
        }));

        $this->assertEquals([1, 3, 5], array_values($output));
    }

    public function testAny()
    {
        $input = [1, 2, 3, 4, 5];

        $result = f\any($input, function ($v) {
            return $v == 3;
        });
        $this->assertEquals(true, $result);

        $result = f\any($input, function ($v) {
            return $v == 6;
        });
        $this->assertEquals(false, $result);
    }

    public function testAll()
    {
        $input = [1, 2, 3, 4, 5];
        $result = f\all($input, function ($v) {
            return is_numeric($v);
        });
        $this->assertEquals(true, $result);

        $input = [1, 2, 3, 4, 'test'];
        $result = f\all($input, function ($v) {
            return is_numeric($v);
        });
        $this->assertEquals(false, $result);
    }
}
