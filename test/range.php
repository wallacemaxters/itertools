<?php

include __DIR__ . '/../vendor/autoload.php';


use WallaceMaxters\Itertools\Range;
use WallaceMaxters\Itertools\RangePairs;
use WallaceMaxters\Itertools\Iterators\Enumerator;
use WallaceMaxters\Itertools\Iterators\ArrayPosition;

$range = new Range(1, 10);

$option = isset($argv[1]) ? $argv[1] : NULL;

if ($option == 'range') {

    foreach ($range as $key => $value)
    {
        printf("%s => %s\n", $key, $value);
    }
}

if ($option == 'enum') {
    
    foreach ($enum = new Enumerator($range, 10000) as $key => $value) {
        
        printf("%s => %s\n", $key, $value);
    }

    print_r(iterator_to_array($enum));
    print_r(iterator_to_array($enum->getInnerIterator()));
} 


if ($option == 'groupby')
{
		
}

if ($option == 'pairs')
{
	$pairs = new RangePairs(50, 70);

	print_r(iterator_to_array($pairs));
}



if ($option == 'arraypos')
{
	$pos = new ArrayPosition([
		'nome'      => 'wallace',
		'idade'     => '26',
		'languages' => ['php']
	]);

	$pos->seek(2);

	var_dump($pos->getPosition());
}
