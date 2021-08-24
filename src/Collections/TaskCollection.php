<?php

namespace Awork\Collections;

use Awork\Model\Task;
use Illuminate\Support\Collection;

class TaskCollection extends Collection
{
    /** @var Task[] */
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = array_map(fn($item) => new Task($item), $items);
    }
}