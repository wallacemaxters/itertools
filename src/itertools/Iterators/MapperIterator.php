<?php

namespace WallaceMaxters\Itertools\Iterators;

use Traversable;
use IteratorIterator;

/**
* @author Wallace de Souza Vizerra <wallacemaxters@gmail.com>
*/
class MapperIterator extends IteratorIterator implements Mappable
{   
    /**
    * @var callable
    */
    protected $callback;

    /**
    * @param \Traversable $iterator
    * @param callable $callback
    * @return void
    */
    public function __construct(Traversable $iterator, callable $callback)
    {
        $this->setMapper($callback);
        
        parent::__construct($iterator);
    }

    /**
    * @{inheritdoc}
    */
    public function setMapper(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
    * Current value of iteration afftected by callback
    * @return mixed
    */
    public function current()
    {
        if (! $this->valid()) return;
        
        return call_user_func($this->callback, parent::current(), $this->key(), $this);
    }
}