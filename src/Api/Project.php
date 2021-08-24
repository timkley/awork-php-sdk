<?php

namespace Awork\Api;

use Awork\Api;
use Awork\Collections\ProjectCollection;
use Awork\Collections\TaskCollection;
use Awork\Collections\TaskStatusCollection;
use Awork\Model\Project as ProjectModel;

class Project
{
    public const ENDPOINT = 'projects';

    public function __construct(protected Api $api)
    {
    }

    public function get(): ProjectCollection
    {
        return new ProjectCollection(
            $this->api->get(self::ENDPOINT)->json()
        );
    }

    public function getProject(string $projectId): ProjectModel
    {
        return new ProjectModel(
            $this->api->get(sprintf('%s/%s', self::ENDPOINT, $projectId))->json()
        );
    }

    public function create(array $data): ProjectModel
    {
        return new ProjectModel(
            $this->api->post(self::ENDPOINT, $data)->json()
        );
    }

    public function getProjectTasks(string $projectId): TaskCollection
    {
        return new TaskCollection(
            $this->api->get(sprintf('%s/%s/projecttasks', self::ENDPOINT, $projectId))->json()
        );
    }

    public function getTaskStatuses(string $projectId): TaskStatusCollection
    {
        return new TaskStatusCollection(
            $this->api->get(sprintf('%s/%s/taskstatuses', self::ENDPOINT, $projectId))->json()
        );
    }
}
