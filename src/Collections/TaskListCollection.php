<?php

namespace Awork\Collections;

use Awork\Model\TaskList;
use Illuminate\Support\Collection;

class TaskListCollection extends Collection
{
    /** @var TaskList[] */
    protected $items = [];

    public static function fromArray(array $items): self
    {
        return new self(array_map(fn ($item) => new TaskList($item), $items));
    }
}
