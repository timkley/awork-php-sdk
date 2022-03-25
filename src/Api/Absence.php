<?php

namespace Awork\Api;

use Awork\Collections\AbsenceCollection;
use Awork\Model\Absence as AbsenceModel;

class Absence extends Endpoint
{
    public const ENDPOINT = 'absences';

    public function get(): AbsenceCollection
    {
        return AbsenceCollection::fromArray(
            $this->api->get(self::ENDPOINT)->json()
        );
    }

    public function getAbsence(string $userId): AbsenceModel
    {
        return new AbsenceModel(
            $this->api->get(sprintf('%s/%s', self::ENDPOINT, $userId))->json()
        );
    }
}
