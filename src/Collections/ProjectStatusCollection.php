<?php

namespace Awork\Collections;

use Awork\Model\ProjectStatus;
use Illuminate\Support\Collection;

class ProjectStatusCollection extends Collection
{
    /** @var ProjectStatus[] */
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = array_map(fn ($item) => new ProjectStatus($item), $items);
    }
}
