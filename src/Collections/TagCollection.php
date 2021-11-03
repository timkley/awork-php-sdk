<?php

namespace Awork\Collections;

use Awork\Model\Tag;
use Illuminate\Support\Collection;

class TagCollection extends Collection
{
    /** @var Tag[] */
    protected $items = [];

    public static function fromArray(array $items)
    {
        return new self(array_map(fn ($item) => new Tag($item), $items));
    }
}
