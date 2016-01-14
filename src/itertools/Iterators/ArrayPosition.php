<?php

namespace WallaceMaxters\IterTools\Iterators;

use ArrayIterator as BaseArrayIterator;
use WallaceMaxters\Itertools\PositionInterface;

class ArrayPosition extends BaseArrayIterator implements PositionInterface
{
	protected $position = 0;

	public function getPosition()
	{
		return $this->position;
	}

	public function next()
	{
		parent::next();

		++$this->position;
	}

	public function seek($position)
	{
		parent::seek($position);

		$this->position = $position;
	}
}