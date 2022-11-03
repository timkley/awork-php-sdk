<?php

namespace Tests\Model;

use Awork\Model\Absence;
use Carbon\Carbon;

it('creates a model from data', function () {
    $fixture = getJsonFixture('absence.json');
    $fixture['isHalfDayOnEnd'] = true;

    $absence = new Absence($fixture);

    expect($absence->getId())->toBe('9a8b29c8-22ac-ec11-a99b-38563d68624f');
    expect($absence->getUserId())->toBe('a6ff5e4a-a555-eb11-a607-00155d31310d');
    expect($absence->getstarton())->tobeinstanceof(Carbon::class);
    expect($absence->getEndOn())->toBeInstanceOf(Carbon::class);
    expect($absence->getStartOn()->toDateString())->toBe('2022-04-08');
    expect($absence->getEndOn()->toDateString())->toBe('2022-04-10');
    expect($absence->isHalfDayOnStart())->toBeFalse();
    expect($absence->isHalfDayOnEnd())->toBeTrue();
});
