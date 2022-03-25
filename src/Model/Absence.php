<?php

namespace Awork\Model;

use Awork\Collections\ContactInfoCollection;
use Awork\Collections\TeamCollection;
use Carbon\Carbon;

class Absence extends Model
{
    private string $id;
    private string $userId;
    private Carbon $startOn;
    private Carbon $endOn;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->userId = $data['userId'] ?? '';
        $this->startOn = Carbon::parse($data['startOn']);
        $this->endOn = Carbon::parse($data['endOn']);
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
}
