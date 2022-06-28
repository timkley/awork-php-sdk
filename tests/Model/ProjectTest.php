<?php

namespace Tests\Model;

use Awork\Collections\MilestoneCollection;
use Awork\Collections\TagCollection;
use Awork\Collections\TaskCollection;
use Awork\Collections\TaskListCollection;
use Awork\Collections\UserCollection;
use Awork\Model\Company;
use Awork\Model\Project;
use Awork\Model\ProjectStatus;
use Awork\Model\ProjectType;

it('creates a model from data', function () {
    $fixture = getJsonFixture('project.json');

    $project = new Project($fixture);

    expect($project->getId())->toBe('0f06ec20-9601-ec11-b563-dc984023d47e');
    expect($project->getKey())->toBe('AC1');
    expect($project->getName())->toBe('First Project');
    expect($project->getTimeBudget())->toBe(280800);
    expect($project->getPlannedDuration())->toBe(0);
    expect($project->getTrackedDuration())->toBe(3353);
    expect($project->getBillableByDefault())->toBe(false);
    expect($project->getProjectType())->toBeInstanceOf(ProjectType::class);
    expect($project->getProjectStatus())->toBeInstanceOf(ProjectStatus::class);
    expect($project->getCompany())->toBeInstanceOf(Company::class);
    expect($project->getTags())->toBeInstanceOf(TagCollection::class);
    expect($project->getMembers())->toBeInstanceOf(UserCollection::class);
});

it('can set model data explicitly', function () {
    $fixture = getJsonFixture('project.json');

    $project = new Project($fixture);

    $project->setMilestones(MilestoneCollection::fromArray(getJsonFixture('milestones.json')));
    $project->setProjectTasks(TaskCollection::fromArray(getJsonFixture('projectTasks.json')));
    $project->setTaskLists(TaskListCollection::fromArray(getJsonFixture('taskLists.json')));

    expect(true)->toBe(true);
});

it('is array accessable', function () {
    $fixture = getJsonFixture('project.json');

    $project = new Project($fixture);

    expect($project->toArray())->toBeArray();
    expect($project->toArray()['name'])->toBe($fixture['name']);
});
