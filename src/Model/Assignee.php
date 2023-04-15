<?php

namespace Awork\Model;

class Assignee extends User
{
    private int $plannedEffort;
    private bool $isDistributedPlannedEffort;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->plannedEffort = $data['plannedEffort'] ?? 0;
        $this->isDistributedPlannedEffort = $data['isDistributedPlannedEffort'] ?? false;
    }

    public function getPlannedEffort(): int
    {
        return $this->plannedEffort;
    }

    public function isDistributedPlannedEffort(): bool
    {
        return $this->isDistributedPlannedEffort;
    }
}
