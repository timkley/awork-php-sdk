<?php

namespace Awork\Api;

use Awork\Api;

class Endpoint
{
    public function __construct(protected Api $api)
    {
    }

    public function addFilter(string $filter): self
    {
        $this->api->setFilter($filter);

        return $this;
    }
}
