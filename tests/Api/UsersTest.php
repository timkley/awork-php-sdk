<?php

namespace Tests\Api;

use Awork\Collections\ContactInfoCollection;
use Awork\Collections\UserCollection;
use Awork\Model\ContactInfo;
use Awork\Model\TimeEntry;
use Awork\Model\User;
use Awork\Model\UserCapacity;
use Illuminate\Http\Client\Response;

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

it('can get the last time entry', function () {
    fakeJsonResponse('timeEntry.json');

    $timeEntry = awork()->users()->lastTimeEntry('user-id');

    expect($timeEntry)->toBeInstanceOf(TimeEntry::class);
    expect($timeEntry->getId())->toBe('2a408383-ae39-ed11-ae83-38563d6848fe');
});

it('can start the time tracking', function () {
    fakeJsonResponse('timeEntry.json');

    $timeEntry = awork()->users()->startTimeTracking('user-id', []);

    expect($timeEntry)->toBeInstanceOf(TimeEntry::class);
    expect($timeEntry->getId())->toBe('2a408383-ae39-ed11-ae83-38563d6848fe');
});

it('can stop the time tracking', function () {
    fakeResponse();
    $response = awork()->users()->stopTimeTracking('user-id');

    expect($response)->toBeInstanceOf(Response::class);
});
