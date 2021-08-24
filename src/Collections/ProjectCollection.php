<?php

namespace Awork\Collections;

use Awork\Model\Project;
use Illuminate\Support\Collection;

class ProjectCollection extends Collection
{
    /** @var Project[] */
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = array_map(fn($item) => new Project($item), $items);
    }
}