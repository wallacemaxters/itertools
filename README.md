## Table of contents

- [\WallaceMaxters\Itertools\Range](#class-wallacemaxtersitertoolsrange)
- [\WallaceMaxters\Itertools\RangePairs](#class-wallacemaxtersitertoolsrangepairs)
- [\WallaceMaxters\Itertools\Iterators\Mappable (interface)](#interface-wallacemaxtersitertoolsiteratorsmappable)
- [\WallaceMaxters\Itertools\Iterators\ArrayPosition](#class-wallacemaxtersitertoolsiteratorsarrayposition)
- [\WallaceMaxters\Itertools\Iterators\Enumerator](#class-wallacemaxtersitertoolsiteratorsenumerator)
- [\WallaceMaxters\Itertools\Iterators\MapperIterator](#class-wallacemaxtersitertoolsiteratorsmapperiterator)
- [\WallaceMaxters\Itertools\Iterators\Positionable (interface)](#interface-wallacemaxtersitertoolsiteratorspositionable)
- [\WallaceMaxters\Itertools\Iterators\RepeatIterator](#class-wallacemaxtersitertoolsiteratorsrepeatiterator)
- [\WallaceMaxters\Itertools\Iterators\GroupBy](#class-wallacemaxtersitertoolsiteratorsgroupby)

<hr /> 
### Class: \WallaceMaxters\Itertools\Range

> Range implementation @author Wallace de Souza Vizerra <wallacemaxters@gmail.com>

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct(</strong><em>int</em> <strong>$min</strong>, <em>int</em> <strong>$max</strong>, <em>mixed/int</em> <strong>$step=1</strong>)</strong> : <em>void</em> |
| public | <strong>count()</strong> : <em>int</em><br /><em>Countable implementation</em> |
| public | <strong>current()</strong> : <em>\WallaceMaxters\Itertools\scalar</em><br /><em>Current value for iteration</em> |
| public | <strong>key()</strong> : <em>\WallaceMaxters\Itertools\scalar</em> |
| public | <strong>next()</strong> : <em>void</em> |
| public | <strong>rewind()</strong> : <em>void</em><br /><em>Reset iteration</em> |
| public | <strong>valid()</strong> : <em>bool</em><br /><em>Detect if iterationis valid</em> |

*This class implements \Iterator, \Traversable, \Countable*

<hr /> 
### Class: \WallaceMaxters\Itertools\RangePairs

> Create range with key as current value@author Wallace de Souza Vizerra <wallacemaxters@gmail.com>

| Visibility | Function |
|:-----------|:---------|
| public | <strong>key()</strong> : <em>\WallaceMaxters\Itertools\scalar</em><br /><em>Returns current value as key</em> |

*This class extends [\WallaceMaxters\Itertools\Range](#class-wallacemaxtersitertoolsrange)*

*This class implements \Countable, \Traversable, \Iterator*

<hr /> 
### Interface: \WallaceMaxters\Itertools\Iterators\Mappable

| Visibility | Function |
|:-----------|:---------|
| public | <strong>setMapper(</strong><em>\callable</em> <strong>$callback</strong>)</strong> : <em>void</em><br /><em>Set the mapper for child Iterator</em> |

*This class implements \OuterIterator, \Traversable, \Iterator*

<hr /> 
### Class: \WallaceMaxters\Itertools\Iterators\ArrayPosition

> ArrayIterator that knows current position of iteration@author Wallace de Souza Vizerra <wallacemaxters@gmail.com>

| Visibility | Function |
|:-----------|:---------|
| public | <strong>getPosition()</strong> : <em>mixed</em> |
| public | <strong>next()</strong> : <em>void</em> |
| public | <strong>rewind()</strong> : <em>void</em> |
| public | <strong>seek(</strong><em>mixed</em> <strong>$position</strong>)</strong> : <em>void</em> |

*This class extends \ArrayIterator*

*This class implements \Countable, \Serializable, \SeekableIterator, \ArrayAccess, \Traversable, \Iterator, [\WallaceMaxters\Itertools\Iterators\Positionable](#interface-wallacemaxtersitertoolsiteratorspositionable)*

<hr /> 
### Class: \WallaceMaxters\Itertools\Iterators\Enumerator

> Enumerates keys of a iterator@author Wallace de Souza Vizerra <wallacemaxters@gmail.com>

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct(</strong><em>\Traversable</em> <strong>$iterator</strong>, <em>\WallaceMaxters\Itertools\Iterators\scalar</em> <strong>$start</strong>)</strong> : <em>void</em> |
| public static | <strong>fromArray(</strong><em>array</em> <strong>$array</strong>, <em>int/string</em> <strong>$start</strong>)</strong> : <em>\WallaceMaxters\Itertools\Iterators\static</em><br /><em>Easy way to enumerate array</em> |
| public | <strong>getStart()</strong> : <em>\WallaceMaxters\Itertools\Iterators\scalar</em><br /><em>Get initial value of iteration</em> |
| public | <strong>key()</strong> : <em>int/string</em><br /><em>Returns key of enumeration</em> |
| public | <strong>next()</strong> : <em>void</em><br /><em>Increment key of enumeration</em> |
| public | <strong>rewind()</strong> : <em>void</em><br /><em>Reset iteration</em> |

*This class extends \IteratorIterator*

*This class implements \OuterIterator, \Traversable, \Iterator*

<hr /> 
### Class: \WallaceMaxters\Itertools\Iterators\MapperIterator

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct(</strong><em>\Traversable</em> <strong>$iterator</strong>, <em>\callable</em> <strong>$callback</strong>)</strong> : <em>void</em> |
| public | <strong>current()</strong> : <em>mixed</em><br /><em>Current value of iteration afftected by callback</em> |
| public | <strong>setMapper(</strong><em>\callable</em> <strong>$callback</strong>)</strong> : <em>void</em> |

*This class extends \IteratorIterator*

*This class implements \OuterIterator, \Traversable, \Iterator, [\WallaceMaxters\Itertools\Iterators\Mappable](#interface-wallacemaxtersitertoolsiteratorsmappable)*

<hr /> 
### Interface: \WallaceMaxters\Itertools\Iterators\Positionable

| Visibility | Function |
|:-----------|:---------|
| public | <strong>getPosition()</strong> : <em>int</em> |

<hr /> 
### Class: \WallaceMaxters\Itertools\Iterators\RepeatIterator

> Iterator that repeat another iterators@author Wallace de Souza Vizerra <wallacemaxters@gmail.com>

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct(</strong><em>\Traversable</em> <strong>$iterator</strong>, <em>int</em> <strong>$repeat</strong>)</strong> : <em>void</em> |
| public static | <strong>fromArray(</strong><em>array</em> <strong>$array</strong>, <em>mixed</em> <strong>$repeat</strong>)</strong> : <em>void</em><br /><em>Easy way to make instance of self class for array operations</em> |
| public | <strong>getPosition()</strong> : <em>mixed</em> |

*This class extends \IteratorIterator*

*This class implements \OuterIterator, \Traversable, \Iterator, [\WallaceMaxters\Itertools\Iterators\Positionable](#interface-wallacemaxtersitertoolsiteratorspositionable)*

<hr /> 
### Class: \WallaceMaxters\Itertools\Iterators\GroupBy

> Group a Iterator according to callback@author Wallace de Souza Vizerra <wallacemaxters@gmail.com>

| Visibility | Function |
|:-----------|:---------|
| public | <strong>__construct(</strong><em>\Iterator</em> <strong>$iterator</strong>, <em>\callable</em> <strong>$callback</strong>, <em>bool</em> <strong>$preserveKeys=true</strong>)</strong> : <em>void</em> |
| public static | <strong>fromArray(</strong><em>array</em> <strong>$array</strong>, <em>\callable</em> <strong>$callback</strong>)</strong> : <em>void</em> |
| public | <strong>getIterator()</strong> : <em>\ArrayIterator</em><br /><em>Implementation of \IteratorAggregate</em> |
| public | <strong>offsetExists(</strong><em>mixed</em> <strong>$key</strong>)</strong> : <em>void</em> |
| public | <strong>offsetGet(</strong><em>mixed</em> <strong>$key</strong>)</strong> : <em>void</em> |
| public | <strong>offsetSet(</strong><em>mixed</em> <strong>$key</strong>, <em>mixed</em> <strong>$value</strong>)</strong> : <em>void</em> |
| public | <strong>offsetUnset(</strong><em>mixed</em> <strong>$key</strong>)</strong> : <em>void</em> |
| public | <strong>set(</strong><em>string/int</em> <strong>$key</strong>, <em>\Iterator</em> <strong>$iterator</strong>)</strong> : <em>void</em><br /><em>Set a new group</em> |
| protected | <strong>parseKey(</strong><em>mixed</em> <strong>$key</strong>)</strong> : <em>void</em><br /><em>Parses the key</em> |

*This class implements \IteratorAggregate, \Traversable, \ArrayAccess*

