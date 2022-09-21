<?php

namespace Tests\Api;

use Awork\Collections\TimeEntryCollection;
use Awork\Model\TimeEntry;

it('can get all time entries', function () {
    fakeJsonResponse('timeEntries.json');

    $timeEntries = awork()->timeEntries()->get();

    expect($timeEntries)->toBeInstanceOf(TimeEntryCollection::class);
});

it('can get one time entry', function () {
    fakeJsonResponse('timeEntry.json');

    $absence = awork()->timeEntries()->getTimeEntry('time-entry-id');

    expect($absence)->toBeInstanceOf(TimeEntry::class);
});
