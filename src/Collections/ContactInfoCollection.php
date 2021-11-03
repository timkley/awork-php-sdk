<?php

namespace Awork\Collections;

use Awork\Model\ContactInfo;
use Illuminate\Support\Collection;

class ContactInfoCollection extends Collection
{
    /** @var ContactInfo[] */
    protected $items = [];

    public static function fromArray(array $items): self
    {
        return new self(array_map(fn($item) => new ContactInfo($item), $items));
    }
}
