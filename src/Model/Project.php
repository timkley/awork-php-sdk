<?php

namespace Awork\Model;

use Awork\Collections\MilestoneCollection;
use Awork\Collections\TagCollection;
use Awork\Collections\TaskCollection;
use Awork\Collections\TaskListCollection;
use Awork\Collections\UserCollection;
use Carbon\Carbon;

class Project
{
    private string $id;
    private string $key;
    private string $name;
    private string $description;
    private int $timeBudget;
    private int $trackedDuration;
    private ?Carbon $dueDate;
    private bool $billableByDefault;
    private ?ProjectType $projectType;
    private ?ProjectStatus $projectStatus;
    private ?Company $company;
    private ?TagCollection $tags;
    private ?UserCollection $members;
    private ?MilestoneCollection $milestones;
    private ?TaskListCollection $taskLists;
    private ?TaskCollection $projectTasks;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->key = $data['key'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->description = $data['description'] ?? '';
        $this->timeBudget = $data['timeBudget'] ?? 0;
        $this->trackedDuration = $data['trackedDuration'] ?? 0;
        $this->dueDate = isset($data['dueDate']) ? Carbon::parse($data['dueDate']) : null;
        $this->billableByDefault = $data['billableByDefault'] ?? false;
        $this->projectType = isset($data['projectType']) ? new ProjectType($data['projectType']) : null;
        $this->projectStatus = isset($data['projectStatus']) ? new ProjectStatus($data['projectStatus']) : null;
        $this->company = isset($data['company']) ? new Company($data['company']) : null;
        $this->tags = isset($data['tags']) ? TagCollection::fromArray($data['tags']) : null;
        $this->members = isset($data['members']) ? UserCollection::fromArray($data['members']) : null;
        $this->milestones = isset($data['milestones']) ? MilestoneCollection::fromArray($data['milestones']) : null;
        $this->taskLists = isset($data['taskLists']) ? TaskListCollection::fromArray($data['taskLists']) : null;
        $this->projectTasks = isset($data['tasks']) ? TaskCollection::fromArray($data['tasks']) : null;
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

    public function getTimeBudget(): int
    {
        return $this->timeBudget;
    }

    public function getTrackedDuration(): int
    {
        return $this->trackedDuration;
    }

    public function getDueDate(): ?Carbon
    {
        return $this->dueDate;
    }

    public function getBillableByDefault(): bool
    {
        return $this->billableByDefault;
    }

    public function getProjectType(): ?ProjectType
    {
        return $this->projectType;
    }

    public function getProjectStatus(): ?ProjectStatus
    {
        return $this->projectStatus;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function getTags(): ?TagCollection
    {
        return $this->tags;
    }

    public function getMembers(): ?UserCollection
    {
        return $this->members;
    }

    public function getMilestones(): ?MilestoneCollection
    {
        return $this->milestones;
    }

    public function setMilestones(?MilestoneCollection $milestones): void
    {
        $this->milestones = $milestones;
    }

    public function getTaskLists(): ?TaskListCollection
    {
        return $this->taskLists;
    }

    public function setTaskLists(?TaskListCollection $taskLists): void
    {
        $this->taskLists = $taskLists;
    }

    public function getProjectTasks(): ?TaskCollection
    {
        return $this->projectTasks;
    }

    public function setProjectTasks(?TaskCollection $projectTasks): void
    {
        $this->projectTasks = $projectTasks;
    }
}
