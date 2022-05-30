<?php

namespace Awork\Api;

use Awork\Collections\UserCollection;
use Awork\Model\User as UserModel;
use Awork\Model\UserCapacity;

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
}
