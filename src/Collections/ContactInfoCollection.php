<?php

namespace Awork\Collections;

use Awork\Model\ContactInfo;
use Illuminate\Support\Collection;

class ContactInfoCollection extends Collection
{
    /** @var ContactInfo[] */
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = array_map(fn($item) => new ContactInfo($item), $items);
    }
}