<?php

namespace Tests\Model;

use Awork\Collections\ContactInfoCollection;
use Awork\Collections\TeamCollection;
use Awork\Model\Team;
use Awork\Model\User;

it('creates a model from data', function () {
    $fixture = getJsonFixture('user.json');

    $user = new User($fixture);

    expect($user->getId())->toBe('b7fe5e4a-a555-eb11-a607-00155d31310d');
    expect($user->getFirstName())->toBe('John');
    expect($user->getLastName())->toBe('Doe');
    expect($user->getGender())->toBe('male');
    expect($user->getPosition())->toBe('CEO');
    expect($user->getTeams())->toBeInstanceOf(TeamCollection::class);
    expect($user->getTeams()->first())->toBeInstanceOf(Team::class);
    expect($user->getContactInfo())->toBeInstanceOf(ContactInfoCollection::class);
});
