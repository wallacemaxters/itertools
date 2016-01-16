<?php

namespace WallaceMaxters\Itertools\Iterators;

use ArrayIterator;

class ArrayPosition extends ArrayIterator implements Positionable
{
    protected $position = 0;

    public function getPosition()
    {
        return $this->position;
    }

    public function next()
    {
        parent::next();

        ++$this->position;
    }

    public function seek($position)
    {
        parent::seek($position);

        $this->position = $position;
    }

    public function rewind()
    {
        parent::rewind();

        $this->position = 0;
    }
}