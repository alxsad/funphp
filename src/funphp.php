<?php

namespace funphp;

function each ($c, \Closure $fn) {
	foreach ($c as $k => $v) {
		$fn($v, $k, $c);
	}
}

function map ($c, \Closure $fn) {
	foreach ($c as $k => $v) {
		yield $k => $fn($v, $k, $c);
	}
}

function filter ($c, \Closure $fn) {
	foreach ($c as $k => $v) {
		if ($fn($v, $k)) {
			yield $k => $v;
		}
	}
}