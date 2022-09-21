<?php

namespace Awork\Api;

use Awork\Collections\TimeEntryCollection;
use Awork\Model\TimeEntry as TimeEntryModel;

class TimeEntry extends Endpoint
{
    public const ENDPOINT = 'timeentries';

    public function get(): TimeEntryCollection
    {
        return TimeEntryCollection::fromArray(
            $this->api->get(sprintf(self::ENDPOINT))->json()
        );
    }

    public function getTimeEntry(string $timeEntryId): TimeEntryModel
    {
        return new TimeEntryModel(
            $this->api->get(sprintf('%s/%s', self::ENDPOINT, $timeEntryId))->json()
        );
    }
}
