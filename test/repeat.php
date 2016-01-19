<?php

include __DIR__ . '/../vendor/autoload.php';

use WallaceMaxters\Itertools;
use WallaceMaxters\Itertools\Iterators\RepeatIterator;

$time = microtime(true);

$range = null;

Itertools\repeat(100, function ($i) use(&$range) {

	iterator_to_array($range = new Itertools\Range(1, 1000));
});


$repeat = RepeatIterator::fromArray(['a', 'b', 'c'], 2);

foreach ($repeat as $key => $value)
{
	echo $key, ' => ', $value, ' position: ', $repeat->getPosition(), PHP_EOL;
}
