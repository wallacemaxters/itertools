<?php

namespace WallaceMaxters\Itertools;


function iterator_to_array_recursive($iterator)
{
	$func = __FUNCTION__;

	if ($iterator instanceof \Iterator)
	{
		return array_map($func, iterator_to_array($iterator));

	} elseif ($iterator instanceof \IteratorAggregate) {

		return array_map($func, iterator_to_array($iterator->getIterator()));
	}

	return $iterator;
}

