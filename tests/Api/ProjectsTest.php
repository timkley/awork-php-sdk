<?php

namespace Tests\Api;

use Awork\Collections\MilestoneCollection;
use Awork\Collections\ProjectCollection;
use Awork\Collections\TaskCollection;
use Awork\Collections\TaskListCollection;
use Awork\Collections\TaskStatusCollection;
use Awork\Model\Project;
use Carbon\Carbon;

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

it('can update a project', function () {
    $fixture = fakeJsonResponse('project.json');

    $task = awork()->projects()->update('task-id', $fixture);

    assertBodySent($fixture);
    expect($task)->toBeInstanceOf(Project::class);
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

it('can get project milestones', function () {
    fakeJsonResponse('milestones.json');

    $milestones = awork()->projects()->getMilestones('project-id');

    expect($milestones)->toBeInstanceOf(MilestoneCollection::class);
    expect($milestones->count())->toBe(2);
    expect($milestones->first()->getColor())->toBe('purple');
    expect($milestones->first()->getDueDate())->toBeInstanceOf(Carbon::class);
});

it('can get project task lists', function () {
    fakeJsonResponse('taskLists.json');

    $taskLists = awork()->projects()->getTaskLists('project-id');

    expect($taskLists)->toBeInstanceOf(TaskListCollection::class);
    expect($taskLists->count())->toBe(2);
    expect($taskLists->first()->getName())->toBe('Second sample list');
});

it('can add a task bundle to a project', function () {
    fakeResponse();

    $response = awork()->projects()->addTaskBundle('project-id', 'task-bundle-id');

    assertBodySent(['taskBundleId' => 'task-bundle-id']);
    expect($response->status())->toBe(200);
});

it('can add a project member to a project', function () {
    fakeResponse();

    $data = [
        'userId' => 'user-id',
        'projectRoleId' => 'role-id',
        'isResponsible' => true,
    ];

    $response = awork()->projects()->addProjectMember('project-id', $data);

    assertBodySent($data);
    expect($response->status())->toBe(200);
});
