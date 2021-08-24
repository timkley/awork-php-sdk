<?php

namespace Awork\Model;

use Awork\Collections\ContactInfoCollection;
use Awork\Collections\TeamCollection;

class User
{
    private string $id;
    private string $firstName;
    private string $lastName;
    private ?string $gender;
    private ?string $position;
    private ?int $capacityPerWeek;
    private ?TeamCollection $teams;
    private ?ContactInfoCollection $contactInfo;
    private ?string $projectRoleId;
    private ?string $projectRoleName;
    private ?bool $isResponsible;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->firstName = $data['firstName'] ?? '';
        $this->lastName = $data['lastName'] ?? '';
        $this->gender = $data['gender'] ?? null;
        $this->position = $data['position'] ?? null;
        $this->capacityPerWeek = $data['capacityPerWeek'] ?? null;
        $this->teams = isset($data['teams']) ? new TeamCollection($data['teams']) : null;
        $this->contactInfo = isset($data['userContactInfos']) ? new ContactInfoCollection($data['userContactInfos']) : null;
        $this->projectRoleId = $data['projectRoleId'] ?? null;
        $this->projectRoleName = $data['projectRoleName'] ?? null;
        $this->isResponsible = $data['isResponsible'] ?? null;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function getCapacityPerWeek(): ?int
    {
        return $this->capacityPerWeek;
    }

    public function getTeams(): ?TeamCollection
    {
        return $this->teams;
    }

    public function getContactInfo(): ?ContactInfoCollection
    {
        return $this->contactInfo;
    }

    public function getProjectRoleId(): ?string
    {
        return $this->projectRoleId;
    }

    public function getProjectRoleName(): ?string
    {
        return $this->projectRoleName;
    }

    public function isResponsible(): ?bool
    {
        return $this->isResponsible;
    }
}