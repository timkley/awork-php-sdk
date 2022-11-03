<?php

namespace Awork\Model;

use Carbon\Carbon;

class Absence extends Model
{
    private string $id;
    private string $userId;
    private Carbon $startOn;
    private Carbon $endOn;
    private bool $isHalfDayOnStart;
    private bool $isHalfDayOnEnd;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->userId = $data['userId'] ?? '';
        $this->startOn = Carbon::parse($data['startOn']);
        $this->endOn = Carbon::parse($data['endOn']);
        $this->isHalfDayOnStart = $data['isHalfDayOnStart'] ?? false;
        $this->isHalfDayOnEnd = $data['isHalfDayOnEnd'] ?? false;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getStartOn(): Carbon
    {
        return $this->startOn;
    }

    public function getEndOn(): Carbon
    {
        return $this->endOn;
    }

    public function isHalfDayOnStart(): bool
    {
        return $this->isHalfDayOnStart;
    }

    public function isHalfDayOnEnd(): bool
    {
        return $this->isHalfDayOnEnd;
    }
}
