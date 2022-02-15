<?php

namespace Awork\Webhook;

use Awork\Model\Model;
use Awork\Model\User;
use Carbon\Carbon;

class Webhook
{
    private Carbon $timestamp;
    private string $eventType;
    private ?Model $entity;
    private string $entityId;
    private string $entityType;
    private string $entityLink;
    private string $traceId;
    private User $triggeredBy;

    public function __construct(array $data)
    {
        $this->timestamp = Carbon::parse($data['timestamp']);
        $this->eventType = $data['eventType'] ?? '';
        $this->entity = $this->toEntity($data['entity'], $data['entityType']);
        $this->entityId = $data['entityId'] ?? '';
        $this->entityType = $data['entityType'] ?? '';
        $this->entityLink = $data['entityLink'] ?? '';
        $this->traceId = $data['traceId'] ?? '';
        $this->triggeredBy = isset($data['triggeredBy']) ? new User($data['triggeredBy']) : null;
    }


    public function getTimestamp(): Carbon
    {
        return $this->timestamp;
    }

    public function getEventType(): string
    {
        return $this->eventType;
    }

    public function getEntity(): ?Model
    {
        return $this->entity;
    }

    public function getEntityId(): string
    {
        return $this->entityId;
    }

    public function getEntityType(): string
    {
        return $this->entityType;
    }

    public function getEntityLink(): string
    {
        return $this->entityLink;
    }

    public function getTraceId(): string
    {
        return $this->traceId;
    }

    public function getTriggeredBy(): ?User
    {
        return $this->triggeredBy;
    }

    protected function toEntity(array $data, string $entityType)
    {
        $class = '\Awork\\Model\\' . ucfirst($entityType);

        if (!class_exists($class)) {
            return null;
        }

        return new $class($data);
    }
}
