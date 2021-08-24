<?php

namespace Tests\Model;

use Awork\Model\TypeOfWork;

it('creates a model from data', function () {
    $fixture = getJsonFixture('typeOfWork.json');

    $typeOfWork = new TypeOfWork($fixture);

    expect($typeOfWork->getId())->toBe('e2095787-bd5a-4a11-dec3-08d8b74cd6d8');
    expect($typeOfWork->getName())->toBe('Projektarbeit');
});
