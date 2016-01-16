<?php

namespace WallaceMaxters\Itertools\Iterators;

/**
* @author Wallace de Souza Vizerra <wallacemaxters@gmail.com>
*/
interface Mappable extends \OuterIterator
{
    /**
    * Set the mapper for children iterator
    * @param callable $callback
    */
    public function setMapper(callable $callback);
}