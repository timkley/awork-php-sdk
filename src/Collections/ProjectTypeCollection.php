<?php

namespace Awork\Collections;

use Awork\Model\ProjectType;
use Illuminate\Support\Collection;

class ProjectTypeCollection extends Collection
{
    /** @var ProjectType[] */
    protected $items = [];

    public static function fromArray(array $items): self
    {
        return new self(array_map(fn ($item) => new ProjectType($item), $items));
    }
}
