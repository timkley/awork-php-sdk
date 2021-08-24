<?php

namespace Tests\Model;

use Awork\Model\ProjectType;

it('creates a model from data', function () {
    $fixture = getJsonFixture('projectType.json');

    $projectType = new ProjectType($fixture);

    expect($projectType->getId())->toBe('d4adce2e-a455-eb11-a607-00155d31310d');
    expect($projectType->getName())->toBe('Internal');
    expect($projectType->getDescription())->toBe('Internal projects');
    expect($projectType->getIcon())->toBe('work');
    expect($projectType->isPreset())->toBe(false);
});
