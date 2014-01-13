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
}
