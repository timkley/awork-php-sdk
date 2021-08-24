<?php

namespace Tests\Model;

use Awork\Model\ProjectStatus;

it('creates a model from data', function () {
    $fixture = getJsonFixture('projectStatus.json');

    $projectStatus = new ProjectStatus($fixture);

    expect($projectStatus->getId())->toBe('c964ddb7-e6e7-eb11-b563-00155d3167af');
    expect($projectStatus->getName())->toBe('In Planung');
    expect($projectStatus->getType())->toBe('not-started');
});
