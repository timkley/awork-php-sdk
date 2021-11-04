<?php

namespace Awork\Model;

class TaskStatus extends Model
{
    public const TYPE_DONE = 'done';
    public const TYPE_TODO = 'todo';
    public const TYPE_STUCK = 'stuck';
    public const TYPE_REVIEW = 'review';
    public const TYPE_IN_PROGRESS = 'progress';

    private string $id;
    private string $name;
    private string $type;
    private ?string $projectId;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->type = $data['type'] ?? 'todo';
        $this->projectId = $data['projectId'] ?? null;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getProjectId(): ?string
    {
        return $this->projectId;
    }
}
