<?php

namespace WallaceMaxters\Itertools;

/**
* @param Traversable $iterator
* @return arrays
*/
function iterator_to_array_recursive($iterator)
{
    $func = __FUNCTION__;

    if ($iterator instanceof \Iterator) {

        return array_map($func, iterator_to_array($iterator));

    } elseif ($iterator instanceof \IteratorAggregate) {

        return array_map($func, iterator_to_array($iterator->getIterator()));
    }

    return $iterator;
}

/**
* Repeat operation
* @param int $number Number of repetitions of callback
* @param callable $callback the callback
*/
function repeat($number, callable $callback)
{
    for ($i = 1; $i <= $number; $i++) $callback($i);
}

