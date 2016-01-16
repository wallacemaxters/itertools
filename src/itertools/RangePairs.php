<?php

namespace WallaceMaxters\Itertools;

class RangePairs extends Range
{
	/**
	* Returns current value as key
	* @return scalar
	*/
    public function key()
    {
        return $this->current();
    }
}