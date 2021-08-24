<?php

namespace Awork\Api;

use Awork\Api;
use Awork\Collections\ProjectTypeCollection;
use Awork\Model\ProjectType as ProjectTypeModel;

class ProjectType
{
    public const ENDPOINT = 'projecttypes';

    public function __construct(protected Api $api)
    {
    }

    public function get(): ProjectTypeCollection
    {
        return new ProjectTypeCollection(
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