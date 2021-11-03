<?php

namespace Awork\Collections;

use Awork\Model\TaskStatus;
use Illuminate\Support\Collection;

class TaskStatusCollection extends Collection
{
    /** @var TaskStatus[] */
    protected $items = [];

    public static function fromArray(array $items): self
    {
        return new self(array_map(fn($item) => new TaskStatus($item), $items));
    }
}
