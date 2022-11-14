<?php

class Data
{
    private string $deathReason;
    private array $nonViolentDeath;
    private array $violentDeath;
    private array $violentDeathType;

    public function __construct(string $deathReason, array $nonViolentDeath, array $violentDeath, array $violentDeathType)
    {
        $this->deathReason = $deathReason;
        $this->nonViolentDeath = $nonViolentDeath;
        $this->violentDeath = $violentDeath;
        $this->violentDeathType = $violentDeathType;
    }

    public function getDeathReason(): string
    {
        return $this->deathReason;
    }

    public function getNonViolentDeath(): array
    {
        return $this->nonViolentDeath;
    }

    public function getViolentDeath(): array
    {
        return $this->violentDeath;
    }

    public function getViolentDeathType(): array
    {
        return $this->violentDeathType;
    }
}