<?php

namespace WallaceMaxters\Itertools\Iterators;

use Iterator;
use Countable;

class IteratorObserver extends Enumerator implements Observer
{
	protected $count;

	public function __construct(Iterator $iterator)
	{
		parent::__construct($iterator, 1);
	}

	public function key()
	{
		return $this->getInnerIterator()->key();
	}

	public function isFirst()
	{
		return parent::key() === 1;
	}

	public function isLast()
	{
		$iterator = clone $this->getInnerIterator();

		$position = parent::key();

		if ($iterator instanceof Countable) {

			return count($iterator) === $position;
		}

		return iterator_count($iterator) === $position;
	}
}