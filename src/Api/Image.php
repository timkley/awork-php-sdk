<?php

namespace Awork\Api;

use Illuminate\Http\Client\Response;

class Image extends Endpoint
{
    public const ENDPOINT = 'files/images/%s/%s';

    public function get(string $entityName, string $entityId): Response
    {
        return $this->api->get(sprintf(self::ENDPOINT, $entityName, $entityId));
    }
}
