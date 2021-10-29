<?php

namespace Awork;

use Awork\Api\Comment;
use Awork\Api\Project;
use Awork\Api\ProjectStatus;
use Awork\Api\ProjectTemplate;
use Awork\Api\ProjectType;
use Awork\Api\Task;
use Awork\Api\User;

class Awork
{
    public Api $api;

    private Task $tasks;
    private Project $projects;
    private ProjectType $projectType;
    private ProjectTemplate $projectTemplate;
    private User $users;
    private Comment $comments;

    public function __construct(string $apiToken)
    {
        $this->api = new Api($apiToken);
    }

    public static function create(string $apiToken): Awork
    {
        return new self($apiToken);
    }

    public function tasks(): Task
    {
        return $this->tasks ??= new Task($this->api);
    }

    public function projects(): Project
    {
        return $this->projects ??= new Project($this->api);
    }

    public function projectTypes(): ProjectType
    {
        return $this->projectType ??= new ProjectType($this->api);
    }

    public function projectTemplates(): ProjectTemplate
    {
        return $this->projectTemplate ??= new ProjectTemplate($this->api);
    }

    public function projectStatuses(): ProjectStatus
    {
        return $this->projectStatuses ??= new ProjectStatus($this->api);
    }

    public function users(): User
    {
        return $this->users ??= new User($this->api);
    }

    public function comments(): Comment
    {
        return $this->comments ??= new Comment($this->api);
    }
}
