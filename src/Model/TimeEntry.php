<?php

namespace Awork\Model;

use Carbon\Carbon;

class TimeEntry extends Model
{
    private string $id;
    private string $createdBy;
    private Carbon $createdOn;
    private string $updatedBy;
    private Carbon $updatedOn;
    private TypeOfWork $typeOfWork;
    private User $user;
    private ?Task $task;
    private ?Project $project;
    private int $duration;
    private bool $isBillable;
    private bool $isBilled;
    private Carbon $startTime;
    private ?Carbon $endTime;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->createdBy = $data['createdBy'] ?? '';
        $this->createdOn = Carbon::parse($data['createdOn']);
        $this->updatedBy = $data['updatedBy'] ?? '';
        $this->updatedOn = Carbon::parse($data['updatedOn']);
        $this->typeOfWork = new TypeOfWork($data['typeOfWork']);
        $this->user = new User($data['user']);
        $this->task = isset($data['task']) ? new Task($data['task']) : null;
        $this->project = isset($data['project']) ? new Project($data['project']) : null;
        $this->duration = $data['duration'] ?? 0;
        $this->isBillable = $data['isBillable'] ?? false;
        $this->isBilled = $data['isBilled'] ?? false;
        $this->startTime = Carbon::parse($data['startDateUtc'])->setTimeFromTimeString($data['startTimeUtc']);
        $this->endTime = isset($data['endDateUtc']) ? Carbon::parse($data['endDateUtc'])->setTimeFromTimeString($data['endTimeUtc']) : null;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getCreatedBy(): string
    {
        return $this->createdBy;
    }

    public function getCreatedOn(): Carbon
    {
        return $this->createdOn;
    }

    public function getUpdatedBy(): string
    {
        return $this->updatedBy;
    }

    public function getUpdatedOn(): Carbon
    {
        return $this->updatedOn;
    }

    public function getTypeOfWork(): TypeOfWork
    {
        return $this->typeOfWork;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getTask(): ?Task
    {
        return $this->task;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function getIsBillable(): bool
    {
        return $this->isBillable;
    }

    public function getIsBilled(): bool
    {
        return $this->isBilled;
    }

    public function getStartTime(): Carbon
    {
        return $this->startTime;
    }

    public function getEndTime(): ?Carbon
    {
        return $this->endTime;
    }
}
