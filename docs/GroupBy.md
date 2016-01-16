#WallaceMaxters\Itertools\Iterator\GroupBy

A class GroupBy provê a funcionalidade de agrupar os elementos de um Iterator qualquer através de um callback. 

Você pode por exemplo criar uma condição dentro desse callback e retornar um valor para a chave de acordo com a condição que é testada em cima do valor atual.

Exemplo:

```php
$frutas = new ArrayIterator([
	'banana ouro',
	'maçã argentina',
	'maçã verde',
	'banana prata',
	'banana nanica',
	'pêra', 'uva', 'maçã'
]);

$groups = new GroupBy($frutas, function ($v)
{
	preg_match('/\w+/u', $v, $match);

	return $match[0];
});

print_r(WallaceMaxters\Iterators\iterator_to_array_recursive($groups));

```


O retorno disso será 
```
Array
(
    [banana] => Array
        (
            [0] => banana ouro
            [3] => banana prata
            [4] => banana nanica
        )

    [maçã] => Array
        (
            [1] => maçã argentina
            [2] => maçã verde
            [7] => maçã
        )

    [pêra] => Array
        (
            [5] => pêra
        )

    [uva] => Array
        (
            [6] => uva
        )

)
```

Agora, um outro pequeno teste, verificando se uma sequência de números é impar ou par.


```

$groups = new GroupBy(new Range(1, 10), function ()
{
    return $value % 2 == 0 ? 'par' : 'impar';

}, false);

print_r(WallaceMaxters\Iterators\iterator_to_array_recursive($groups));
```

A saída será:
```
Array
(
    [ímpar] => Array
        (
            [1] => 1
            [3] => 3
            [5] => 5
            [7] => 7
            [9] => 9
        )

    [par] => Array
        (
            [2] => 2
            [4] => 4
            [6] => 6
            [8] => 8
            [10] => 10
        )

)
```


Para preservação de chaves ou não, podemos utilizar o terceiro parâmetro de `GroupBy::__construct`, que se chama $preserverKeys. Se o mesmo for omitido, `TRUE` será o padrão.


A lógica do construtor dessa classe é dessa forma:

```
GroupBy::__construct(Iterator $iterator, callable $callback, $preserveKeys = true)
```



#Conversão de valores para chaves

Os valores retornados pelo callback passado em `GroupBy` serão válidos se possuirem as seguintes definições:

- Ser um valor scalar

- Ser um valor `NULL`

- Ser um objeto. Se implementar __toString, será a chave esse valor. Se não implementar __toString, será retornado o `spl_object_hash`  do mesmo.

