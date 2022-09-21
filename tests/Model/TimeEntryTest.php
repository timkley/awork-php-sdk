<?php

namespace Tests\Model;

use Awork\Model\Project;
use Awork\Model\Task;
use Awork\Model\TimeEntry;
use Awork\Model\TypeOfWork;
use Awork\Model\User;
use Carbon\Carbon;

it('creates a model from data', function () {
    $fixture = getJsonFixture('timeEntry.json');

    $timeEntry = new TimeEntry($fixture);

    expect($timeEntry->getId())->toBe('2a408383-ae39-ed11-ae83-38563d6848fe');
    expect($timeEntry->getCreatedBy())->toBe('83477d16-a455-eb11-a607-00155d31310d');
    expect($timeEntry->getCreatedOn())->toBeInstanceOf(Carbon::class);
    expect($timeEntry->getUpdatedBy())->toBe('83477d16-a455-eb11-a607-00155d31310d');
    expect($timeEntry->getUpdatedOn())->toBeInstanceOf(Carbon::class);
    expect($timeEntry->getTypeOfWork())->toBeInstanceOf(TypeOfWork::class);
    expect($timeEntry->getUser())->toBeInstanceOf(User::class);
    expect($timeEntry->getTask())->toBeInstanceOf(Task::class);
    expect($timeEntry->getProject())->toBeInstanceOf(Project::class);
    expect($timeEntry->getDuration())->toBe(100);
    expect($timeEntry->getIsBillable())->toBe(false);
    expect($timeEntry->getIsBilled())->toBe(false);
    expect($timeEntry->getStartTime())->toBeInstanceOf(Carbon::class);
    expect($timeEntry->getEndTime())->toBeNull();
    expect($timeEntry->getNote())->toBe('Note');
});
