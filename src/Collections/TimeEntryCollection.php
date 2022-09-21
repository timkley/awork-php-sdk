<?php

namespace Awork\Collections;

use Awork\Model\TimeEntry;
use Illuminate\Support\Collection;

class TimeEntryCollection extends Collection
{
    /** @var TimeEntry[] */
    protected $items = [];

    public static function fromArray(array $items): self
    {
        return new self(array_map(fn ($item) => new TimeEntry($item), $items));
    }
}
