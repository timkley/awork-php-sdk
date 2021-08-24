<?php

namespace Awork\Model;

class ContactInfo
{
    private string $id;
    private string $type;
    private bool $isAddress;
    private ?string $subType;
    private ?string $label;
    private ?string $value;
    private ?string $addressLine1;
    private ?string $addressLine2;
    private ?string $zipCode;
    private ?string $city;
    private ?string $state;
    private ?string $country;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->type = $data['type'] ?? '';
        $this->isAddress = $data['isAddress'] ?? false;
        $this->subType = $data['subType'] ?? null;
        $this->label = $data['label'] ?? null;
        $this->value = $data['value'] ?? null;
        $this->addressLine1 = $data['addressLine1'] ?? null;
        $this->addressLine2 = $data['addressLine2'] ?? null;
        $this->zipCode = $data['zipCode'] ?? null;
        $this->city = $data['city'] ?? null;
        $this->state = $data['state'] ?? null;
        $this->country = $data['country'] ?? null;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getIsAddress(): bool
    {
        return $this->isAddress;
    }

    public function getSubType(): ?string
    {
        return $this->subType;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }
}