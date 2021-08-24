<?php

namespace Awork\Collections;

use Awork\Model\User;
use Illuminate\Support\Collection;

class UserCollection extends Collection
{
    /** @var User[] */
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = array_map(fn($item) => new User($item), $items);
    }
}