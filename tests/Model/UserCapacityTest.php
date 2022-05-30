<?php

namespace Tests\Model;

use Awork\Collections\ContactInfoCollection;
use Awork\Collections\TeamCollection;
use Awork\Model\Team;
use Awork\Model\User;
use Awork\Model\UserCapacity;

it('creates a model from data', function () {
    $fixture = getJsonFixture('userCapacity.json');

    $user = new UserCapacity($fixture);

    expect($user->getUserId())->toBe('83477d16-a455-eb11-a607-00155d31310d');
    expect($user->getCapacityPerWeek())->toBe(86400);
});
