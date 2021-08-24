<?php

namespace Awork\Collections;

use Awork\Model\ProjectType;
use Illuminate\Support\Collection;

class ProjectTypeCollection extends Collection
{
    /** @var ProjectType[] */
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = array_map(fn($item) => new ProjectType($item), $items);
    }
}