<?php

namespace Awork\Model;

class Team extends Model
{
    private string $id;
    private string $name;
    private string $icon;
    private string $color;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->icon = $data['icon'] ?? '';
        $this->color = $data['color'] ?? '';
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }
}
