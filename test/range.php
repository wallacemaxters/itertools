<?php

include __DIR__ . '/../vendor/autoload.php';


use WallaceMaxters\Itertools\Range;

use WallaceMaxters\Itertools\RangePairs;
use WallaceMaxters\Itertools\Iterators\Enumerator;
use WallaceMaxters\Itertools\Iterators\GroupBy;
use WallaceMaxters\Itertools\Iterators\ArrayPosition;

$option = isset($argv[1]) ? $argv[1] : NULL;

if ($option == 'range') {
	
	$range = new Range(1, 10);

    foreach ($range as $key => $value) {
    	
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
	$group = new GroupBy(new RangePairs(1, 10), function ($v)
	{
		return $v % 2 == 0 ? 'par' : 'ímpar';
	});

	print_r(WallaceMaxters\Itertools\iterator_to_array_recursive($group));

	$frutas = new ArrayIterator([
		'banana ouro',
		'maçã argentina',
		'maçã verde',
		'banana prata',
		'banana nanica',
		'pêra', 'uva', 'maçã'
	]);

	$group1 = new GroupBy($frutas, function ($v)
	{
		preg_match('/\w+/u', $v, $match);

		return $match[0];
	});

	print_r(WallaceMaxters\Itertools\iterator_to_array_recursive($group1));
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
