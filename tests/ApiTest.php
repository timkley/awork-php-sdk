<?php

namespace Tests;

use Awork\Api\Project;
use Awork\Api\Task;

it('returns the task api', function () {
    expect(awork()->tasks())->toBeInstanceOf(Task::class);
});

it('returns the project api', function () {
    expect(awork()->projects())->toBeInstanceOf(Project::class);
});