#Enumerator

A classe `WallaceMaxters\Itertools\Iterators\ssEnumerator` provê uma forma de enumerar os elementos da iteração, partindo de um ponto principal definido pelo usuário. Se for omitido, esse valor é definido para 0.

Geralmente, quando se quer enumerar iterações de  um array partindo de  um determinado número se faz assim:


```php
$array = [1, 2, 3];

foreach ($array as $key => $value)
{
	echo $key + 6000, '=>', $value;
}
```


Com a `Enumerator` as coisas ficariam assim:

```php

$array = [1, 2, 3];

foreach (Enumerator::fromArray($array, 6000) as $key => $value)
{
	echo $key, '=>', $value;
}
```

A vantagem de usar `Enumerator` é que ela funciona com qualquer tipo de iterator.

```php
$enum = new Enumerator(
	new Range(10, 100, 10),
	5000
);

foreach ($enum as $key => $value)
{
   echo $key, '=>', $value;
}
```


A saída será:

```
5000 => 10,
5001 => 20,
5002 => 30,
...
```

Para obter o valor `Iterator::key` original, basta utilizar o método `getInnerIterator`


```php
foreach ($enum as $key => $value)
{
	echo $key, '=>', $value, "[$enum->getInnerIterator()->key()]";
}
```

A saída para isso seria:

```
5000 => 10, [0]
5001 => 20, [1]
5002 => 30, [2]
```