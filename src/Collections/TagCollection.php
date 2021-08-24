<?php

namespace Awork\Collections;

use Awork\Model\Tag;
use Illuminate\Support\Collection;

class TagCollection extends Collection
{
    /** @var Tag[] */
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = array_map(fn($item) => new Tag($item), $items);
    }
}