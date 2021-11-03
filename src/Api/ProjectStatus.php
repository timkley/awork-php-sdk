<?php

namespace Awork\Api;

use Awork\Api;
use Awork\Collections\ProjectStatusCollection;
use Awork\Model\ProjectStatus as ProjectStatusModel;

class ProjectStatus
{
    public const ENDPOINT = 'projectStatuses';

    public function __construct(protected Api $api)
    {
    }

    public function get(): ProjectStatusCollection
    {
        return ProjectStatusCollection::fromArray(
            $this->api->get(self::ENDPOINT)->json()
        );
    }

    public function getProjectStatus(string $projectStatusId): ProjectStatusModel
    {
        return new ProjectStatusModel(
            $this->api->get(sprintf('%s/%s', self::ENDPOINT, $projectStatusId))->json()
        );
    }

    public function create(array $data): ProjectStatusModel
    {
        return new ProjectStatusModel(
            $this->api->post(self::ENDPOINT, $data)->json()
        );
    }
}
