s<?php

namespace WallaceMaxters\Itertools;

class RangePairs extends Range
{
	public function key()
	{
		return $this->current();
	}
}