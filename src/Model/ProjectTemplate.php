<?php

namespace Awork\Model;

use Awork\Collections\ProjectStatusCollection;

class ProjectTemplate
{
    private string $id;
    private string $name;
    private string $description;
    private bool $billableByDefault;
    private ?ProjectStatusCollection $projectStatuses;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->description = $data['description'] ?? '';
        $this->billableByDefault = $data['isBillableByDefault'] ?? false;
        $this->projectStatuses = isset($data['projectStatuses']) ? new ProjectStatusCollection($data['projectStatuses']) : null;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getBillableByDefault(): bool
    {
        return $this->billableByDefault;
    }

    public function getProjectStatuses(): ?ProjectStatusCollection
    {
        return $this->projectStatuses;
    }
}