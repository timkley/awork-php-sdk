<?php

namespace Awork\Model;

class ProjectType
{
    private string $id;
    private string $name;
    private string $description;
    private string $icon;
    private ?bool $isPreset;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->description = $data['description'] ?? '';
        $this->icon = $data['icon'] ?? '';
        $this->isPreset = $data['isPreset'] ?? null;
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

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function isPreset(): ?bool
    {
        return $this->isPreset;
    }
}
