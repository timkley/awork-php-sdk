<?php

namespace Awork\Collections;

use Awork\Model\Milestone;
use Illuminate\Support\Collection;

class MilestoneCollection extends Collection
{
    /** @var Milestone[] */
    protected $items = [];

    public static function fromArray(array $items): self
    {
        return new self(array_map(fn ($item) => new Milestone($item), $items));
    }
}
