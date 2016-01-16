<?php

namespace WallaceMaxters\Itertools\Iterators;

use Iterator;
use ArrayAccess;
use UnexpectedValueException;
use ArrayIterator;
use IteratorAggregate;

class GroupBy implements IteratorAggregate, ArrayAccess
{
    protected $groups = [];

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

    public function getIterator()
    {
        return new ArrayIterator($this->groups);
    }

    public function remove($key)
    {
        $value = $this->groups[$key];

        unset($this->groups[$key]);

        return $value;
    }

    public function get($key)
    {
        if ($this->has($key)) {

            return $this->groups[$key];
        }
    }

    public function set($key, Iterator $iterator)
    {
        $this->groups[$key] = $iterator;
    }

    public function has($key)
    {
        return isset($this->groups[$key]);
    }

    public function offsetSet($key, $value)
    {
        return $this->set($key, $value);
    }

    public function offsetExists($key)
    {
        return $this->has($key);
    }

    public function offsetGet($key)
    {
        return $this->get($key);
    }

    public function offsetUnset($key)
    {
        return $this->remove($key);
    }

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

