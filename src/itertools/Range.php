<?php

namespace WallaceMaxters\Itertools;

use Iterator;
use Countable;

class Range implements Iterator, Countable
{   

    /**
    * @var int
    */
    protected $min;

    /**
    * @var int
    */
    protected $max;

    /**
    * @var int
    */
    protected $step;

    /**
    * @var int
    */
    protected $current;

    /**
    * @var int
    */
    protected $key;

    public function __construct($min, $max, $step = 1)
    {

        $this->min = $min;  

        $this->max = $max;

        $this->step = $step;

        $this->current = $this->min;

        $this->key = 0;
    }

    public function key()
    {
        return $this->valid() ? $this->key : NULL;
    }

    public function next()
    {
        $this->current += $this->step;

        $this->key++;
    }

    public function current()
    {
        return $this->valid() ? $this->current : NULL;
    }

    public function valid()
    {
        if ($this->step > 0) {

            return $this->current <= $this->max;
        }

        return $this->current >= $this->max;
    }

    public function rewind()
    {
        $this->current = $this->min;

        $this->key = 0;
    }

    public function count()
    {
        return iterator_count($this);
    }
}