<?php

namespace Awork\Api;

use Awork\Api;
use Awork\Collections\ProjectTemplateCollection;
use Awork\Model\ProjectTemplate as ProjectTemplateModel;

class ProjectTemplate extends Endpoint
{
    public const ENDPOINT = 'projecttemplates';

    public function get(): ProjectTemplateCollection
    {
        return ProjectTemplateCollection::fromArray(
            $this->api->get(self::ENDPOINT)->json()
        );
    }

    public function getProjectTemplate(string $projectTypeId): ProjectTemplateModel
    {
        return new ProjectTemplateModel(
            $this->api->get(sprintf('%s/%s', self::ENDPOINT, $projectTypeId))->json()
        );
    }
}
