<?php

namespace Tests\Webhook;

use Awork\Model\Project;
use Awork\Model\User;
use Awork\Webhook\Webhook;
use Carbon\Carbon;

it('it constructs a webhook instance from a webhook payload', function () {
    $fixture = getJsonFixture('webhook-payload.json');

    $webhook = new Webhook($fixture);

    expect($webhook->getTimestamp())->toBeInstanceOf(Carbon::class);
    expect($webhook->getTimestamp()->toDateTimeString())->toBe(Carbon::parse('2022-02-11T14:32:04.3360137+00:00')->toDateTimeString());
    expect($webhook->getEventType())->toBe('project_status_changed');
    expect($webhook->getEntity())->toBeInstanceOf(Project::class);
    expect($webhook->getEntityId())->toBe('83343fb9-ca87-eb11-a607-00155d314496');
    expect($webhook->getEntityType())->toBe('project');
    expect($webhook->getEntityLink())->toBe('https://awork.com/projects/83343fb9-ca87-eb11-a607-00155d314496');
    expect($webhook->getTraceId())->toBe('214579f24bb266f0');
    expect($webhook->getTriggeredBy())->toBeInstanceOf(User::class);
    expect($webhook->getRawData())->toBeArray();
});
