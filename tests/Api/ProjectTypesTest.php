<?php

namespace Tests\Api;

use Awork\Collections\ProjectTypeCollection;
use Awork\Model\ProjectType;

it('can get all project types', function () {
    fakeJsonResponse('projectTypes.json');

    $projectTypes = awork()->projectTypes()->get();

    expect($projectTypes)->toBeInstanceOf(ProjectTypeCollection::class);
});

it('can get a single project type', function () {
    fakeJsonResponse('projectType.json');

    $projectType = awork()->projectTypes()->getProjectType('test-id');

    expect($projectType)->toBeInstanceOf(ProjectType::class);
});
