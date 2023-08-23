<?php

namespace Awork\Api;

use Awork\Collections\ContactInfoCollection;
use Awork\Collections\UserCollection;
use Awork\Model\TimeEntry as TimeEntryModel;
use Awork\Model\User as UserModel;
use Awork\Model\UserCapacity;
use Illuminate\Http\Client\Response;

class User extends Endpoint
{
    public const ENDPOINT = 'users';

    public function get(): UserCollection
    {
        return UserCollection::fromArray(
            $this->api->get(self::ENDPOINT)->json()
        );
    }

    public function getUser(string $userId): UserModel
    {
        return new UserModel(
            $this->api->get(sprintf('%s/%s', self::ENDPOINT, $userId))->json()
        );
    }

    public function getUserCapacity(string $userId): UserCapacity
    {
        return new UserCapacity(
            $this->api->get(sprintf('%s/%s/capacity', self::ENDPOINT, $userId))->json()
        );
    }

    public function getContactInfo(string $userId): ContactInfoCollection
    {
        return ContactInfoCollection::fromArray(
            $this->api->get(sprintf('%s/%s/contactinfo', self::ENDPOINT, $userId))->json()
        );
    }

    public function lastTimeEntry(string $userId): TimeEntryModel
    {
        return new TimeEntryModel(
            $this->api->get(sprintf('%s/%s/timeentries/last', self::ENDPOINT, $userId))->json()
        );
    }

    public function startTimeTracking(string $userId, array $data): TimeEntryModel
    {
        return new TimeEntryModel(
            $this->api->post(sprintf('%s/%s/timetracking/start', self::ENDPOINT, $userId), $data)->json()
        );
    }

    public function stopTimeTracking(string $userId, array $data = []): Response
    {
        return $this->api->post(sprintf('%s/%s/timetracking/stop', self::ENDPOINT, $userId), $data);
    }
}
