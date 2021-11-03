<?php

namespace Awork\Api;

use Awork\Api;
use Awork\Collections\UserCollection;
use Awork\Model\User as UserModel;

class User
{
    public const ENDPOINT = 'users';

    public function __construct(protected Api $api)
    {
    }

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
}
