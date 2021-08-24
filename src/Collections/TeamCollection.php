<?php

namespace Awork\Collections;

use Awork\Model\Team;
use Illuminate\Support\Collection;

class TeamCollection extends Collection
{
    /** @var Team[] */
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = array_map(fn ($item) => new Team($item), $items);
    }
}
