<?php

namespace WallaceMaxters\Itertools\Iterators;

interface IteratorMappable extends \OuterIterator
{
	public function setMapper(callable $callback);
}