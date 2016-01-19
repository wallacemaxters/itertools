<?php

include __DIR__ . '/../vendor/autoload.php';

use WallaceMaxters\Itertools\Iterators\MapperIterator;
use WallaceMaxters\Itertools\Range;

$cb1 = function ($value)
{
    return sprintf('%01d', $value);
};  

$cb2 = function ($value, $key)
{
    return json_encode([$key => $value]);
};


$range = new Range(-9, 10);

$mapper = new MapperIterator($range, $cb2);

print_r(iterator_to_array($mapper));

$mapper->setMapper($cb1);

print_r(iterator_to_array($mapper));

var_dump($mapper->current());