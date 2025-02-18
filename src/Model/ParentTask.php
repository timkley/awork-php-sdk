<?php

namespace Awork\Model;

class ParentTask extends Model
{
    private string $id;
    private string $name;
    private string $createdBy;
    private string $userId;
    private array $assigneeIds;


    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->createdBy = $data['createdBy'] ?? '';
        $this->userId = $data['userId'] ?? '';
        $this->assigneeIds = $data['assigneeIds'] ?? '';
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCreatedBy(): string
    {
        return $this->createdBy;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getAssigneeIds(): array
    {
        return $this->assigneeIds;
    }
}
