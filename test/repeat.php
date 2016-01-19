<?php

include __DIR__ . '/../vendor/autoload.php';

use WallaceMaxters\Itertools;

$time = microtime(true);

$range = null;

Itertools\repeat(100, function ($i) use(&$range) {

	iterator_to_array($range = new Itertools\Range(1, 1000));
});


