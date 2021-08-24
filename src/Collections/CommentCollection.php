<?php

namespace Awork\Collections;

use Awork\Model\Comment;
use Illuminate\Support\Collection;

class CommentCollection extends Collection
{
    /** @var Comment[] */
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = array_map(fn ($item) => new Comment($item), $items);
    }
}
