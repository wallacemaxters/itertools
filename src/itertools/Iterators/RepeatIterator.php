<?php

namespace WallaceMaxters\Itertools\Iterators;

use AppendIterator;
use ArrayIterator;
use IteratorIterator;
use Traversable;
use WallaceMaxters\Itertools;

/**
* Iterator that repeat another iterators
* @author Wallace de Souza Vizerra <wallacemaxters@gmail.com>
*/

class RepeatIterator extends IteratorIterator implements Positionable
{
    /**
    * Limit of repetition
    * @var int
    */
    protected $limit;

    /**
    * @param \Traversable $iterator
    * @param int $repeat
    */
    public function __construct(Traversable $iterator, $repeat)
    {

        parent::__construct($appendIterator = new AppendIterator);

        $appendIterator->append($iterator);

        if (! is_int($repeat) || $repeat < 1) {

            throw new InvalidArgumentException(
                'Argument #2 passed to constructor should be integer greater than 1'
            );
        }

        Itertools\repeat($repeat - 1, function () use($appendIterator, $iterator)
        {
            $appendIterator->append($iterator);
        });
        
    }

    /**
    * @{inheritdoc}
    */
    public function getPosition()
    {
        return $this->getInnerIterator()->getIteratorIndex() + 1;
    }

    /**
    * Easy way to make instance of self class for array operations
    */
    public static function fromArray(array $array, $repeat)
    {
        return new self(new ArrayIterator($array), $repeat);
    }

}