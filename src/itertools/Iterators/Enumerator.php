<?php

namespace WallaceMaxters\Itertools\Iterators;

use Traversable;
use IteratorIterator;
use ArrayIterator;

class Enumerator extends IteratorIterator
{   
    /**
    * Initial value for enumerator
    * @param int  
    */
    protected $start = 0;

    /**
    * @param int
    */
    protected $key = 0;

    /**
    * @param Traversable $iterator
    * @param scalar $start
    */
    public function __construct(Traversable $iterator, $start = 0)
    {
        parent::__construct($iterator);

        $this->start = $start;

        $this->key = $this->start;
    }

    public function key()
    {
        return $this->key;
    }

    public function next()
    {
        ++$this->key;

        parent::next();
    }

    public function rewind()
    {
        $this->key = $this->start;

        parent::rewind();
    }

    public static function fromArray($array, $start = 0)
    {
        return new self(new ArrayIterator($array), $start);
    }

}