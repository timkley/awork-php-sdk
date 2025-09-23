<?php

namespace Awork\Model;

use Awork\Collections\UserCollection;
use Carbon\Carbon;

class Comment extends Model
{
    private string $id;
    private string $entityType;
    private string $entityId;
    private ?Carbon $createdOn;
    private ?User $user;
    private ?UserCollection $mentions;
    private string $formattedMessage;
    private string $plainFormattedMessage;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->entityType = $data['entityType'] ?? '';
        $this->entityId = $data['entityId'] ?? '';
        $this->createdOn = isset($data['createdOn']) ? Carbon::parse($data['createdOn']) : null;
        $this->user = isset($data['user']) ? new User($data['user']) : null;
        $this->mentions = isset($data['mentions']['users']) ? UserCollection::fromArray($data['mentions']['users']) : null;
        $this->formattedMessage = $data['formattedMessage'] ?? '';
        $this->plainFormattedMessage = $data['plainFormattedMessage'] ?? '';
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getEntityType(): string
    {
        return $this->entityType;
    }

    public function getEntityId(): string
    {
        return $this->entityId;
    }

    public function getCreatedOn(): ?Carbon
    {
        return $this->createdOn;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function getMentions(): ?UserCollection
    {
        return $this->mentions;
    }

    public function getFormattedMessage(): string
    {
        return $this->formattedMessage;
    }

    public function getPlainFormattedMessage(): string
    {
        return $this->plainFormattedMessage;
    }
}
