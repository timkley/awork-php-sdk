<?php

namespace Tests\Model;

use Awork\Model\Team;

it('creates a model from data', function () {
    $fixture = getJsonFixture('team.json');

    $team = new Team($fixture);

    expect($team->getId())->toBe('f3168754-a455-eb11-a607-00155d31310d');
    expect($team->getName())->toBe('Dev');
    expect($team->getIcon())->toBe('cloud');
    expect($team->getColor())->toBe('green');
});
