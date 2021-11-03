<?php

namespace Awork\Collections;

use Awork\Model\Team;
use Illuminate\Support\Collection;

class TeamCollection extends Collection
{
    /** @var Team[] */
    protected $items = [];

    public static function fromArray(array $items): self
    {
        return new self(array_map(fn($item) => new Team($item), $items));
    }
}
