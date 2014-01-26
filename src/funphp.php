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
        if ($fn($v, $k, $c)) {
            yield $k => $v;
        }
    }
}

function any ($c, \Closure $fn) {
    foreach ($c as $k => $v) {
        if ($fn($v, $k, $c)) {
            return true;
        }
    }
    return false;
}

function all ($c, \Closure $fn) {
    foreach ($c as $k => $v) {
        if (!$fn($v, $k, $c)) {
            return false;
        }
    }
    return true;
}