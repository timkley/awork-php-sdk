<?php

namespace Tests\Api;

use Awork\Collections\UserCollection;
use Awork\Model\User;

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
