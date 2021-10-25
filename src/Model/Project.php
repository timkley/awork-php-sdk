<?php

namespace Awork\Model;

use Awork\Collections\TagCollection;
use Awork\Collections\UserCollection;

class Project
{
    private string $id;
    private string $key;
    private string $name;
    private string $description;
    private int $timeBudget;
    private int $trackedDuration;
    private bool $billableByDefault;
    private ?ProjectType $projectType;
    private ?ProjectStatus $projectStatus;
    private ?Company $company;
    private ?TagCollection $tags;
    private ?UserCollection $members;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->key = $data['key'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->description = $data['description'] ?? '';
        $this->timeBudget = $data['timeBudget'] ?? 0;
        $this->trackedDuration = $data['trackedDuration'] ?? 0;
        $this->billableByDefault = $data['billableByDefault'] ?? false;
        $this->projectType = isset($data['projectType']) ? new ProjectType($data['projectType']) : null;
        $this->projectStatus = isset($data['projectStatus']) ? new ProjectStatus($data['projectStatus']) : null;
        $this->company = isset($data['company']) ? new Company($data['company']) : null;
        $this->tags = isset($data['tags']) ? new TagCollection($data['tags']) : null;
        $this->members = isset($data['members']) ? new UserCollection($data['members']) : null;
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
}
