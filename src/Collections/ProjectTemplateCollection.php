<?php

namespace Awork\Collections;

use Awork\Model\ProjectTemplate;
use Illuminate\Support\Collection;

class ProjectTemplateCollection extends Collection
{
    /** @var ProjectTemplate[] */
    protected $items = [];

    public static function fromArray(array $items): self
    {
        return new self(array_map(fn ($item) => new ProjectTemplate($item), $items));
    }
}
