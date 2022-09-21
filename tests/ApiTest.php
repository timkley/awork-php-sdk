<?php

namespace Tests;

use Awork\Api\Comment;
use Awork\Api\Image;
use Awork\Api\Me;
use Awork\Api\Project;
use Awork\Api\ProjectStatus;
use Awork\Api\ProjectTemplate;
use Awork\Api\ProjectType;
use Awork\Api\Task;
use Awork\Api\TimeEntry;
use Awork\Api\User;

it('returns the me api', function () {
    expect(awork()->me())->toBeInstanceOf(Me::class);
});

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

it('returns the time entries api', function () {
    expect(awork()->timeEntries())->toBeInstanceOf(TimeEntry::class);
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

it('can be ordered', function () {
    fakeResponse();
    $order = "dueOn";

    awork()->projects()->addOrder($order)->get();
    $response = awork()->api->latestResponse;
    parse_str($response->effectiveUri()->getQuery(), $queries);

    expect($queries)->toBe(
        [
            'orderby' => $order,
        ]
    );
});

it('can set the page', function () {
    fakeResponse();

    awork()->projects()->page(3)->get();
    $response = awork()->api->latestResponse;
    parse_str($response->effectiveUri()->getQuery(), $queries);

    expect($queries)->toBe(
        [
            'page' => '3',
        ]
    );
});

it('can set the page size', function () {
    fakeResponse();

    awork()->projects()->pageSize(4)->get();
    $response = awork()->api->latestResponse;
    parse_str($response->effectiveUri()->getQuery(), $queries);

    expect($queries)->toBe(
        [
            'pageSize' => '4',
        ]
    );
});
