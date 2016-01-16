<?php

namespace WallaceMaxters\Itertools\Iterators;

interface Observer
{
	public function isLast();

	public function isFirst();
}