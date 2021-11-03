<?php

namespace Awork\Collections;

use Awork\Model\Comment;
use Illuminate\Support\Collection;

class CommentCollection extends Collection
{
    /** @var Comment[] */
    protected $items = [];

    public static function fromArray(array $items): self
    {
        return new self(array_map(fn ($item) => new Comment($item), $items));
    }
}
