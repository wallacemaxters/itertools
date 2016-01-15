<?php

namespace WallaceMaxters\Itertools\Iterators;

use ArrayIterator as BaseArrayIterator;

class ArrayPosition extends BaseArrayIterator implements Positionable
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
}