<?php

namespace Tests\Api;

use Awork\Model\Task;

it('can get a single task', function () {
    fakeJsonResponse('task.json');

    $task = awork()->tasks()->getTask('task-id');

    expect($task)->toBeInstanceOf(Task::class);
});

it('can create a task', function () {
    $fixture = fakeJsonResponse('task.json');

    $task = awork()->tasks()->create($fixture);

    expect($task)->toBeInstanceOf(Task::class);
});

it('can update a task', function () {
    $fixture = fakeJsonResponse('task.json');

    $task = awork()->tasks()->update('task-id', $fixture);

    assertBodySent($fixture);
    expect($task)->toBeInstanceOf(Task::class);
});

it('changes a task status', function () {
    $requestBody = [
        'taskId' => 'task-id',
        'statusId' => 'status-id',
    ];
    fakeResponse($requestBody);

    awork()->tasks()->changeStatus('task-id', 'status-id');

    assertBodySent($requestBody);
});
