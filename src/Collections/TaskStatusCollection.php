<?php

namespace Awork\Collections;

use Awork\Model\TaskStatus;
use Illuminate\Support\Collection;

class TaskStatusCollection extends Collection
{
    /** @var TaskStatus[] */
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = array_map(fn ($item) => new TaskStatus($item), $items);
    }
}
