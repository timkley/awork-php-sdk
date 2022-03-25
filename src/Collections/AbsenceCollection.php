<?php

namespace Awork\Collections;

use Awork\Model\Absence;
use Illuminate\Support\Collection;

class AbsenceCollection extends Collection
{
    /** @var Absence[] */
    protected $items = [];

    public static function fromArray(array $items): self
    {
        return new self(array_map(fn ($item) => new Absence($item), $items));
    }
}
