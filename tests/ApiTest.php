<?php

namespace Tests;

use Awork\Api\Comment;
use Awork\Api\Image;
use Awork\Api\Project;
use Awork\Api\ProjectStatus;
use Awork\Api\ProjectTemplate;
use Awork\Api\ProjectType;
use Awork\Api\Task;
use Awork\Api\User;

it('returns the task api', function () {
    expect(awork()->tasks())->toBeInstanceOf(Task::class);
});

it('returns the project api', function () {
    expect(awork()->projects())->toBeInstanceOf(Project::class);
});

it('returns the project types api', function () {
    expect(awork()->projectTypes())->toBeInstanceOf(ProjectType::class);
});

it('returns the project templates api', function () {
    expect(awork()->projectTemplates())->toBeInstanceOf(ProjectTemplate::class);
});

it('returns the project statuses api', function () {
    expect(awork()->projectStatuses())->toBeInstanceOf(ProjectStatus::class);
});

it('returns the users api', function () {
    expect(awork()->users())->toBeInstanceOf(User::class);
});

it('returns the comments api', function () {
    expect(awork()->comments())->toBeInstanceOf(Comment::class);
});

it('returns the images api', function () {
    expect(awork()->images())->toBeInstanceOf(Image::class);
});

it('can be filtered', function () {
    fakeResponse();
    $filter = "Name eq 'Test'";

    awork()->projects()->addFilter($filter)->get();
    $response = awork()->api->latestResponse;
    parse_str($response->effectiveUri()->getQuery(), $queries);

    expect($queries)->toBe(
        [
            'filterby' => $filter,
        ]
    );
});
