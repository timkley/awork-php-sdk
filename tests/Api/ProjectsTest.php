<?php

namespace Tests\Api;

use Awork\Collections\ProjectCollection;
use Awork\Collections\TaskCollection;
use Awork\Collections\TaskStatusCollection;
use Awork\Model\Project;

it('can get all projects', function () {
    fakeJsonResponse('projects.json');
    $projects = awork()->projects()->get();

    expect($projects)->toBeInstanceOf(ProjectCollection::class);
    expect($projects->count())->toBe(2);
    expect($projects->first())->toBeInstanceOf(Project::class);
});

it('can get one project', function () {
    fakeJsonResponse('project.json');

    $project = awork()->projects()->getProject('project-id');

    expect($project)->toBeInstanceOf(Project::class);
});

it('can create a project', function () {
    $fixture = fakeJsonResponse('project.json');

    $project = awork()->projects()->create($fixture);

    assertBodySent($fixture);
    expect($project)->toBeInstanceOf(Project::class);
});

it('can get project tasks', function () {
    fakeJsonResponse('tasks.json');

    $projectTasks = awork()->projects()->getProjectTasks('project-id');

    expect($projectTasks)->toBeInstanceOf(TaskCollection::class);
    expect($projectTasks->count())->toBe(2);
});

it('can get project task statuses', function () {
    fakeJsonResponse('taskStatuses.json');

    $taskStatuses = awork()->projects()->getTaskStatuses('project-id');

    expect($taskStatuses)->toBeInstanceOf(TaskStatusCollection::class);
    expect($taskStatuses->count())->toBe(6);
    expect($taskStatuses->first()->getProjectId())->toBe('6339d5c4-2691-eb11-a607-00155d314496');
});
