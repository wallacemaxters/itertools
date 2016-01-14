s<?php

namespace WallaceMaxters\Itertools;

class RangePairs extends Range implements PositionInterface
{
	public function key()
	{
		return $this->current();
	}
}