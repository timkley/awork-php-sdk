<?php

namespace Tests\Model;

use Awork\Model\Assignee;

it('creates a model from data', function () {
    $fixture = getJsonFixture('assignee.json');

    $assignee = new Assignee($fixture);

    expect($assignee->getId())->toBe('b7fe5e4a-a555-eb11-a607-00155d31310d');
    expect($assignee->getFirstName())->toBe('John');
    expect($assignee->getLastName())->toBe('Doe');
    expect($assignee->getPlannedEffort())->toBe(123);
    expect($assignee->isDistributedPlannedEffort())->toBeTrue();
});
