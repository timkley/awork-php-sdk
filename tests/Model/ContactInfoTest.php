<?php

namespace Tests\Model;

use Awork\Model\ContactInfo;

it('creates a model from data', function () {
    $fixture = getJsonFixture('contactInfo.json');

    $contactInfo = new ContactInfo($fixture);

    expect($contactInfo->getId())->toBe('1fa11067-4329-40a3-a8e6-97f5aa2d777e');
    expect($contactInfo->getType())->toBe('address');
    expect($contactInfo->getIsAddress())->toBe(true);
    expect($contactInfo->getSubType())->toBe('work');
    expect($contactInfo->getLabel())->toBe(null);
    expect($contactInfo->getValue())->toBe(null);
    expect($contactInfo->getAddressLine1())->toBe('300 E. Street SW');
    expect($contactInfo->getAddressLine2())->toBe(' Suite 5R30');
    expect($contactInfo->getZipCode())->toBe('20546');
    expect($contactInfo->getCity())->toBe('Washington');
    expect($contactInfo->getState())->toBe('District of Columbia');
    expect($contactInfo->getCountry())->toBe('US');
});
