<?php

namespace Awork\Model;

use Awork\Collections\AssigneeCollection;
use Awork\Collections\TagCollection;
use Awork\Collections\TaskListCollection;
use Awork\Collections\UserCollection;
use Carbon\Carbon;

class Task extends Model
{
    private string $id;
    private string $key;
    private string $name;
    private string $description;
    private bool $isSubtask;
    private bool $isPrio;
    private ?Carbon $startOn;
    private ?Carbon $dueOn;
    private int $plannedDuration;
    private int $trackedDuration;
    private int $totalPlannedDuration;
    private int $totalTrackedDuration;
    private ?Project $project;
    private ?UserCollection $assignees;
    private ?TaskStatus $taskStatus;
    private ?TypeOfWork $typeOfWork;
    private ?TagCollection $tags;
    private ?TaskListCollection $lists;
    private ?Carbon $createdOn;
    private ?Carbon $updatedOn;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->key = $data['key'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->description = $data['description'] ?? '';
        $this->isSubtask = $data['isSubtask'] ?? false;
        $this->isPrio = $data['isPrio'] ?? false;
        $this->startOn = isset($data['startOn']) ? Carbon::parse($data['startOn']) : null;
        $this->dueOn = isset($data['dueOn']) ? Carbon::parse($data['dueOn']) : null;
        $this->plannedDuration = $data['plannedDuration'] ?? 0;
        $this->trackedDuration = $data['trackedDuration'] ?? 0;
        $this->totalPlannedDuration = $data['totalPlannedDuration'] ?? 0;
        $this->totalTrackedDuration = $data['totalTrackedDuration'] ?? 0;
        $this->project = isset($data['project']) ? new Project($data['project']) : null;
        $this->assignees = isset($data['assignees']) ? AssigneeCollection::fromArray($data['assignees']) : null;
        $this->taskStatus = isset($data['taskStatus']) ? new TaskStatus($data['taskStatus']) : null;
        $this->typeOfWork = isset($data['typeOfWork']) ? new TypeOfWork($data['typeOfWork']) : null;
        $this->tags = isset($data['tags']) ? TagCollection::fromArray($data['tags']) : null;
        $this->lists = isset($data['lists']) ? TaskListCollection::fromArray($data['lists']) : null;
        $this->createdOn = isset($data['createdOn']) ? Carbon::parse($data['createdOn']) : null;
        $this->updatedOn = isset($data['updatedOn']) ? Carbon::parse($data['updatedOn']) : null;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function isPrio(): bool
    {
        return $this->isPrio;
    }

    public function isSubtask(): bool
    {
        return $this->isSubtask;
    }

    public function getStartOn(): ?Carbon
    {
        return $this->startOn;
    }

    public function getDueOn(): ?Carbon
    {
        return $this->dueOn;
    }

    public function getPlannedDuration(): int
    {
        return $this->plannedDuration;
    }

    public function setPlannedDuration(int $plannedDuration): void
    {
        $this->plannedDuration = $plannedDuration;
    }

    public function getTotalPlannedDuration(): int
    {
        return $this->totalPlannedDuration;
    }

    public function getTotalTrackedDuration(): int
    {
        return $this->totalTrackedDuration;
    }

    public function getTrackedDuration(): int
    {
        return $this->trackedDuration;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function getAssignees(): ?UserCollection
    {
        return $this->assignees;
    }

    public function getTaskStatus(): ?TaskStatus
    {
        return $this->taskStatus;
    }

    public function getTypeOfWork(): ?TypeOfWork
    {
        return $this->typeOfWork;
    }

    public function getTags(): ?TagCollection
    {
        return $this->tags;
    }

    public function getLists(): ?TaskListCollection
    {
        return $this->lists;
    }

    public function getCreatedOn(): ?Carbon
    {
        return $this->createdOn;
    }

    public function getUpdatedOn(): ?Carbon
    {
        return $this->updatedOn;
    }
}
