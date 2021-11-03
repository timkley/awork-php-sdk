<?php

namespace Awork\Collections;

use Awork\Model\Project;
use Illuminate\Support\Collection;

class ProjectCollection extends Collection
{
    /** @var Project[] */
    protected $items = [];

    public static function fromArray(array $items): self
    {
        return new self(array_map(fn($item) => new Project($item), $items));
    }
}
