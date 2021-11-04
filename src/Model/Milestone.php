<?php

namespace Awork\Model;

use Carbon\Carbon;

class Milestone
{
    private string $id;
    private string $name;
    private string $description;
    private string $color;
    private ?Carbon $dueDate;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->description = $data['description'] ?? '';
        $this->color = $data['color'] ?? '';
        $this->dueDate = $data['dueDate'] ? Carbon::parse($data['dueDate']) : null;
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

    public function getColor(): string
    {
        return $this->color;
    }

    public function getDueDate(): ?Carbon
    {
        return $this->dueDate;
    }
}
