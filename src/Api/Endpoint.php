<?php

namespace Awork\Api;

use Awork\Api;

class Endpoint
{
    public function __construct(protected Api $api)
    {
    }

    public function addFilter(string $filter): static
    {
        $this->api->setFilter($filter);

        return $this;
    }

    public function addOrder(string $order): static
    {
        $this->api->setOrder($order);

        return $this;
    }
}
