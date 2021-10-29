<?php

namespace Tests\Api;

use Awork\Collections\ProjectStatusCollection;
use Awork\Model\ProjectStatus;

it('can get all project statuses', function () {
    fakeJsonResponse('projectStatuses.json');
    $projectStatuses = awork()->projectStatuses()->get();

    expect($projectStatuses)->toBeInstanceOf(ProjectStatusCollection::class);
    expect($projectStatuses->count())->toBe(5);
    expect($projectStatuses->first())->toBeInstanceOf(ProjectStatus::class);
});

it('can get one project status', function () {
    fakeJsonResponse('projectStatus.json');

    $projectStatus = awork()->projectStatuses()->getProjectStatus('project-status-id');

    expect($projectStatus)->toBeInstanceOf(ProjectStatus::class);
});

it('can create a project status', function () {
    $fixture = fakeJsonResponse('projectStatus.json');

    $projectStatus = awork()->projectStatuses()->create($fixture);

    assertBodySent($fixture);
    expect($projectStatus)->toBeInstanceOf(ProjectStatus::class);
});
