<?php

namespace Awork\Collections;

use Awork\Model\Assignee;

class AssigneeCollection extends UserCollection
{
    /** @var Assignee[] */
    protected $items = [];

    public static function fromArray(array $items): self
    {
        return new self(array_map(fn ($item) => new Assignee($item), $items));
    }
}
