<?php

namespace WallaceMaxters\Itertools\Iterators;

use Iterator;
use ArrayAccess;
use ArrayIterator;
use IteratorAggregate;
use UnexpectedValueException;

/**
* Group a Iterator according to callback
* @author Wallace de Souza Vizerra <wallacemaxters@gmail.com>
*/
class GroupBy implements IteratorAggregate, ArrayAccess
{

    /**
    * @var array
    */
    protected $groups = [];

    /**
    * @param \Iterator $iterator
    * @param callable $callback
    * @param bool $preserveKeys true
    */
    public function __construct(Iterator $iterator, callable $callback, $preserveKeys = true)
    {   

        foreach ($iterator as $key => $value) {

            $group_key = $this->parseKey(
                $callback($value, $key, $iterator)
            );

            if (! isset($this[$group_key])) {

                $this[$group_key] = new ArrayIterator;
            }

            $this[$group_key][$preserveKeys ? $key : NULL] = $value;
            
        }
    }

    /**
    * Implementation of \IteratorAggregate
    * @return \ArrayIterator
    */
    public function getIterator()
    {
        return new ArrayIterator($this->groups);
    }

    /**
    * Set a new group
    * @param string|int $key
    * @param \Iterator $iterator
    */
    public function set($key, Iterator $iterator)
    {
        $this->groups[$key] = $iterator;
    }

    public function offsetSet($key, $value)
    {
        return $this->set($key, $value);
    }

    public function offsetExists($key)
    {
        return isset($this->groups[$key]);
    }

    public function offsetGet($key)
    {
        return $this->offsetExists($key) ? $this->groups[$key] : null;
    }

    public function offsetUnset($key)
    {
        unset($this->groups[$key]);
    }

    /**
    * Parses the key
    * @throws \UnexpectedValueException
    * @param mixed $key
    */
    protected function parseKey($key)
    {
        if (is_scalar($key) || is_null($key)) {

            return $key;

        } elseif (is_object($key)) {

            if (method_exists($key, '__toString')) {
                return (string) $key;
            }

            return spl_object_hash($key);

        }

        throw new UnexpectedValueException('Value is not a valid key');
    }

    public static function fromArray(array $array, callable $callback)
    {
        return new self(new ArrayIterator($array), $callback);
    }
    
}

