<?php

namespace Awork\Collections;

use Awork\Model\ProjectTemplate;
use Illuminate\Support\Collection;

class ProjectTemplateCollection extends Collection
{
    /** @var ProjectTemplate[] */
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = array_map(fn ($item) => new ProjectTemplate($item), $items);
    }
}
