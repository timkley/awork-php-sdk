<?php

namespace Tests\Model;

use Awork\Collections\AssigneeCollection;
use Awork\Collections\TagCollection;
use Awork\Collections\TaskCollection;
use Awork\Model\Project;
use Awork\Model\Task;
use Awork\Model\TaskStatus;
use Awork\Model\TypeOfWork;
use Carbon\Carbon;

it('creates a model from data', function () {
    $fixture = getJsonFixture('task.json');

    $task = new Task($fixture);

    expect($task->getId())->toBe('00b77844-8324-4b40-969b-931cbf52c359');
    expect($task->getKey())->toBe('HS-01');
    expect($task->getName())->toBe('Fly me to the Moon');
    expect($task->getDescription())->toBe('I want to be up there.');
    expect($task->isPrio())->toBe(false);
    expect($task->isSubtask())->toBe(true);
    expect($task->getStartOn())->toBeInstanceOf(Carbon::class);
    expect($task->getPlannedDuration())->toBe(3600);
    expect($task->getTrackedDuration())->toBe(2330);
    expect($task->getTotalPlannedDuration())->toBe(21600);
    expect($task->getTotalTrackedDuration())->toBe(123);
    expect($task->getProject())->toBeInstanceOf(Project::class);
    expect($task->getTaskStatus())->toBeInstanceOf(TaskStatus::class);
    expect($task->getAssignees())->toBeInstanceOf(AssigneeCollection::class);
    expect($task->getTypeOfWork())->toBeInstanceOf(TypeOfWork::class);
    expect($task->getTags())->toBeInstanceOf(TagCollection::class);
    expect($task->getCreatedOn())->toBeInstanceOf(Carbon::class);
    expect($task->getUpdatedOn())->toBeInstanceOf(Carbon::class);

    $subtasks = getJsonFixture('tasks.json');

    $task->setSubtasks(new TaskCollection($subtasks));

    expect($task->getSubtasks())->toBeInstanceOf(TaskCollection::class);
});

it('correctly creates a grouped collection with subtasks', function () {
    $tasks = getJsonFixture('tasks.json');

    $taskCollection = TaskCollection::fromArray($tasks);
    expect($taskCollection->count())->toBe(2);

    $groupedTasks = $taskCollection->grouped();
    expect($groupedTasks->count())->toBe(1);
    expect($groupedTasks->first()->getSubtasks()->count())->toBe(1);
});
