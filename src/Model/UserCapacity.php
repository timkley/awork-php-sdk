<?php

namespace Awork\Model;

class UserCapacity extends Model
{
    private string $userId;
    private int $capacityPerWeek;

    public function __construct(array $data)
    {
        $this->userId = $data['userId'] ?? '';
        $this->capacityPerWeek = $data['capacityPerWeek'] ?? 0;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getCapacityPerWeek(): int
    {
        return $this->capacityPerWeek;
    }
}
