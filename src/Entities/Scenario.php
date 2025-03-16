<?php

namespace CW\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "scenarios")]
class Scenario
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: "string", length: 40)]
    private string $name;

    #[ORM\Column(type: "string", length: 40)]
    private string $tag;

    #[ORM\ManyToMany(targetEntity: Account::class, inversedBy: "scenarios")]
    private Collection $accounts;

    public function __construct()
    {
        $this->accounts = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTag(): string
    {
        return $this->tag;
    }

    public function setTag(string $tag): Scenario
    {
        $this->tag = $tag;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Scenario
    {
        $this->name = $name;
        return $this;
    }

    public function getAccounts(): Collection
    {
        return $this->accounts;
    }

    public function addAccount(Account $account): Scenario
    {
        $this->accounts[] = $account;
        return $this;
    }
}
