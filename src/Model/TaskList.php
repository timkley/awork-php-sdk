<?php

namespace Awork\Model;

class TaskList
{
    private string $id;
    private string $name;
    private int $order;
    private bool $isArchived;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->order = $data['order'] ?? 0;
        $this->isArchived = $data['isArchived'] ?? false;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function getIsArchived(): bool
    {
        return $this->isArchived;
    }
}
