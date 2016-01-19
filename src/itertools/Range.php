<?php

namespace WallaceMaxters\Itertools;

use Iterator;
use Countable;

/**
* Range implementation 
* @author Wallace de Souza Vizerra <wallacemaxters@gmail.com>
*/
class Range implements Iterator, Countable
{   

    /**
    * Minimum value for range
    * @var int
    */
    protected $min;

    /**
    * Maximum value for range
    * @var int
    */
    protected $max;

    /**
    * Amount of increment
    * @var int
    */
    protected $step;

    /**
    * Current value for iteration
    * @var int
    */
    protected $current;

    /**
    * @var int
    */
    protected $key;

    /**
    * @param int $min
    * @param int $max
    * @param int $step 
    */
    public function __construct($min, $max, $step = 1)
    {

        $this->min = $min;  

        $this->max = $max;

        $this->step = $step;

        $this->rewind();
    }

    public function key()
    {
        return $this->valid() ? $this->key : null;
    }

    /**
    * @return void
    */
    public function next()
    {
        $this->current += $this->step;

        $this->key;
    }

    /**
    * Current value for iteration
    * @return scalar
    */
    public function current()
    {
        return $this->valid() ? $this->current : null;
    }

    /**
    * Detect if iterationis valid
    * @return bool
    */
    public function valid()
    {
        if ($this->step > 0) {

            return $this->current <= $this->max;
        }

        return $this->current >= $this->max;
    }

    /**
    * Reset iteration
    * @return void
    */
    public function rewind()
    {
        $this->current = $this->min;

        $this->key = 0;
    }

    /**
    * Countable implementation
    * @return int
    */
    public function count()
    {
        return iterator_count($this);
    }
}