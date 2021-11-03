<?php

namespace Awork\Collections;

use Awork\Model\Task;
use Illuminate\Support\Collection;

class TaskCollection extends Collection
{
    /** @var Task[] */
    protected $items = [];

    public static function fromArray(array $items): self
    {
        return new self(array_map(fn ($item) => new Task($item), $items));
    }
}
