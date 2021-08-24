<?php

namespace Tests\Model;

use Awork\Collections\TagCollection;
use Awork\Model\Company;

it('creates a model from data', function () {
    $fixture = getJsonFixture('company.json');

    $company = new Company($fixture);

    expect($company->getId())->toBe('c8c39444-a455-eb11-a607-00155d312942');
    expect($company->getName())->toBe('Acme Inc');
    expect($company->getTags())->toBeInstanceOf(TagCollection::class);
});