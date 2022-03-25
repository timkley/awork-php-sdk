<?php

namespace Tests\Api;

use Awork\Collections\AbsenceCollection;
use Awork\Collections\UserCollection;
use Awork\Model\Absence;
use Awork\Model\User;

it('can get all users', function () {
    fakeJsonResponse('absences.json');

    $absences = awork()->absences()->get();

    expect($absences)->toBeInstanceOf(AbsenceCollection::class);
});

it('can get one absence', function () {
    fakeJsonResponse('absence.json');

    $absence = awork()->absences()->getAbsence('absence-id');

    expect($absence)->toBeInstanceOf(Absence::class);
});
