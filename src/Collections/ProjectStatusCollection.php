<?php

namespace Awork\Collections;

use Awork\Model\ProjectStatus;
use Illuminate\Support\Collection;

class ProjectStatusCollection extends Collection
{
    /** @var ProjectStatus[] */
    protected $items = [];

    public static function fromArray(array $items): self
    {
        return new self(array_map(fn ($item) => new ProjectStatus($item), $items));
    }
}
