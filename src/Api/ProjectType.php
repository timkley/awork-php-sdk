<?php

namespace Awork\Api;

use Awork\Collections\ProjectTypeCollection;
use Awork\Model\ProjectType as ProjectTypeModel;

class ProjectType extends Endpoint
{
    public const ENDPOINT = 'projecttypes';

    public function get(): ProjectTypeCollection
    {
        return ProjectTypeCollection::fromArray(
            $this->api->get(self::ENDPOINT)->json()
        );
    }

    public function getProjectType(string $projectTypeId): ProjectTypeModel
    {
        return new ProjectTypeModel(
            $this->api->get(sprintf('%s/%s', self::ENDPOINT, $projectTypeId))->json()
        );
    }
}
