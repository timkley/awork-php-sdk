<?php

namespace Tests\Api;

use Awork\Collections\ProjectTemplateCollection;
use Awork\Model\ProjectTemplate;

it('can get all project templates', function () {
    fakeJsonResponse('projectTemplates.json');

    $projectTemplates = awork()->projectTemplates()->get();

    expect($projectTemplates)->toBeInstanceOf(ProjectTemplateCollection::class);
});

it('can get a single project template', function () {
    fakeJsonResponse('projectTemplate.json');

    $projectTemplate = awork()->projectTemplates()->getProjectTemplate('test-id');

    expect($projectTemplate)->toBeInstanceOf(ProjectTemplate::class);
});