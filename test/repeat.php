<?php

include __DIR__ . '/../vendor/autoload.php';

use WallaceMaxters\Itertools;

Itertools\repeat(50, function ($i) {
	echo "Iteration at {$i}\n";
});


