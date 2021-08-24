<?php

namespace Awork\Model;

use Awork\Collections\TagCollection;

class Company
{
    private string $id;
    private string $name;
    private ?TagCollection $tags;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->tags = isset($data['tags']) ? new TagCollection($data['tags']) : null;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTags(): ?TagCollection
    {
        return $this->tags;
    }
}
