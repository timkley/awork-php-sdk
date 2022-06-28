<?php

namespace Tests\Api;

use Awork\Collections\ContactInfoCollection;
use Awork\Collections\UserCollection;
use Awork\Model\ContactInfo;
use Awork\Model\User;
use Awork\Model\UserCapacity;

it('can get all users', function () {
    fakeJsonResponse('users.json');

    $users = awork()->users()->get();

    expect($users)->toBeInstanceOf(UserCollection::class);
});

it('can get one user', function () {
    fakeJsonResponse('user.json');

    $users = awork()->users()->getUser('user-id');

    expect($users)->toBeInstanceOf(User::class);
});

it('can get the capacity of a user', function () {
    fakeJsonResponse('userCapacity.json');

    $userCapacity = awork()->users()->getUserCapacity('user-id');

    expect($userCapacity)->toBeInstanceOf(UserCapacity::class);
    expect($userCapacity->getUserId())->toBe('83477d16-a455-eb11-a607-00155d31310d');
    expect($userCapacity->getCapacityPerWeek())->toBe(86400);
});

it('can get the contactinfo of a user', function () {
    fakeJsonResponse('contactInfos.json');

    $contactInfo = awork()->users()->getContactInfo('user-id');

    expect($contactInfo)->toBeInstanceOf(ContactInfoCollection::class);
    expect($contactInfo->first())->toBeInstanceOf(ContactInfo::class);
});
