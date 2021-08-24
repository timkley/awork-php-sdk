<?php

namespace Tests\Model;

use Awork\Model\TaskStatus;

it('creates a model from data', function () {
    $fixture = getJsonFixture('taskStatus.json');

    $taskStatus = new TaskStatus($fixture);

    expect($taskStatus->getId())->toBe('1931522e-05ee-eb11-a7ad-dc984021c7cf');
    expect($taskStatus->getName())->toBe('To do');
    expect($taskStatus->getType())->toBe('todo');
});
