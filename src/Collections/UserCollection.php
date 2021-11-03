<?php

namespace Awork\Collections;

use Awork\Model\User;
use Illuminate\Support\Collection;

class UserCollection extends Collection
{
    /** @var User[] */
    protected $items = [];

    public static function fromArray(array $items): self
    {
        return new self(array_map(fn($item) => new User($item), $items));
    }
}
