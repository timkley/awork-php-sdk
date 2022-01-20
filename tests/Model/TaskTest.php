<?php

namespace Tests\Model;

use Awork\Collections\TagCollection;
use Awork\Model\Project;
use Awork\Model\Task;
use Awork\Model\TaskStatus;
use Awork\Model\TypeOfWork;
use Awork\Model\User;
use Carbon\Carbon;

it('creates a model from data', function () {
    $fixture = getJsonFixture('task.json');

    $task = new Task($fixture);

    expect($task->getId())->toBe('00b77844-8324-4b40-969b-931cbf52c359');
    expect($task->getKey())->toBe('HS-01');
    expect($task->getName())->toBe('Fly me to the Moon');
    expect($task->getDescription())->toBe('I want to be up there.');
    expect($task->getIsPrio())->toBe(false);
    expect($task->getStartOn())->toBeInstanceOf(Carbon::class);
    expect($task->getStartOn())->toBeInstanceOf(Carbon::class);
    expect($task->getPlannedDuration())->toBe(3600);
    expect($task->getTrackedDuration())->toBe(2330);
    expect($task->getProject())->toBeInstanceOf(Project::class);
    expect($task->getTaskStatus())->toBeInstanceOf(TaskStatus::class);
    expect($task->getAssignee())->toBeInstanceOf(User::class);
    expect($task->getTypeOfWork())->toBeInstanceOf(TypeOfWork::class);
    expect($task->getTags())->toBeInstanceOf(TagCollection::class);
});
