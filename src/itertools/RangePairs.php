<?php

namespace WallaceMaxters\Itertools;
/**
* Create range with key as current value
* @author Wallace de Souza Vizerra <wallacemaxters@gmail.com>
*/

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