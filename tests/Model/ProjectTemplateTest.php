<?php

namespace Tests\Model;

use Awork\Collections\ProjectStatusCollection;
use Awork\Model\ProjectTemplate;

it('creates a model from data', function () {
    $fixture = getJsonFixture('projectTemplate.json');

    $projectTemplate = new ProjectTemplate($fixture);

    expect($projectTemplate->getId())->toBe('836e6603-3d56-eb11-a607-00155d31310d');
    expect($projectTemplate->getName())->toBe('Pro bono');
    expect($projectTemplate->getDescription())->toBe('Test description');
    expect($projectTemplate->getProjectStatuses())->toBeInstanceOf(ProjectStatusCollection::class);
    expect($projectTemplate->getBillableByDefault())->toBe(true);
});
