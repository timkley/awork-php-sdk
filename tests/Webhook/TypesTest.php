<?php

namespace Tests\Webhook;

use Awork\Webhook\Types;
use ReflectionClass;

it('knows all types a webhook can trigger', function () {
    $typesFixture = [
        'workspace_added',
        'workspace_deleted',
        'user_added',
        'user_deleted',
        'user_status_changed',
        'user_activation_changed',
        'user_updated',
        'project_added',
        'project_deleted',
        'project_status_changed',
        'project_type_changed',
        'project_updated',
        'task_added',
        'task_deleted',
        'task_status_changed',
        'task_type_changed',
        'task_updated',
        'company_added',
        'company_deleted',
        'company_type_changed',
        'company_updated',
        'timetracking_added',
        'timetracking_deleted',
        'timetracking_type_changed',
        'timetracking_updated',
        'project_comment_added',
        'task_comment_added',
        'projectmember_added',
        'projectmember_deleted',
        'taskassignment_added',
        'taskassignment_deleted',
        'absence_added',
        'absence_deleted',
        'absence_updated',
        'tasklist_added',
        'tasklist_deleted',
        'tasklist_updated',
    ];

    $types = new ReflectionClass(Types::class);

    expect(count($typesFixture))->toBe(count($types->getConstants()));

    foreach ($typesFixture as $type) {
        expect(in_array($type, $types->getConstants()))->toBe(true);
    }
});
