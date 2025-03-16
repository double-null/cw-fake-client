<?php

namespace CW\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "accounts")]
class Account
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: "string", length: 80, unique: true)]
    private string $email;

    #[ORM\Column(type: "string", length: 80)]
    private string $password;

    #[ORM\Column(name: "external_id", type: "integer", nullable: true)]
    private int $externalID;

    #[ORM\Column(type: "integer", nullable: true)]
    private int $reputation;

    public function getId(): int
    {
        return $this->id;
    }

    public function getReputation(): int
    {
        return $this->reputation;
    }

    public function setReputation(int $reputation): Account
    {
        $this->reputation = $reputation;
        return $this;
    }

    public function getExternalID(): int
    {
        return $this->externalID;
    }

    public function setExternalID(int $externalID): Account
    {
        $this->externalID = $externalID;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): Account
    {
        $this->password = $password;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): Account
    {
        $this->email = $email;
        return $this;
    }
}