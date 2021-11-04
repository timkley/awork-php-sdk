<?php

namespace Awork\Api;

use Awork\Collections\TaskCollection;

class Me extends Endpoint
{
    public const ENDPOINT = 'me';

    public function getProjectTasks(): TaskCollection
    {
        return TaskCollection::fromArray(
            $this->api->get(sprintf('%s/projecttasks', self::ENDPOINT))->json()
        );
    }
}
