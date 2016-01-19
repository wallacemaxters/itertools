<?php

namespace WallaceMaxters\Itertools\Iterators;

use Traversable;
use IteratorIterator;
use ArrayIterator;

/**
* Enumerates keys of a iterator
* @author Wallace de Souza Vizerra <wallacemaxters@gmail.com>
*/
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

    /**
    * Returns key of enumeration
    * @return int|string
    */
    public function key()
    {
        return $this->key;
    }


    /**
    * Increment key of enumeration
    *
    * @return void
    */
    public function next()
    {
        ++$this->key;

        parent::next();
    }

    /**
    * Reset iteration
    * @return void
    */
    public function rewind()
    {
        $this->key = $this->start;

        parent::rewind();
    }

    /**
    * Easy way to enumerate array
    * @param array $array
    * @param int|string $start
    * @static
    * @return static
    */
    public static function fromArray(array $array, $start = 0)
    {
        return new self(new ArrayIterator($array), $start);
    }

    /**
    * Get initial value of iteration
    * @return scalar
    */
    public function getStart()
    {
        return $this->start;
    }

}