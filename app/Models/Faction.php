<?php

namespace App\Models;

class Faction
{
    private string $name;
    private string $description;
    private string $headquarters;
    private string $symbol;

    /**
     * @var FactionTrait[]
     */
    private array $traits;

    private function __construct(string $name, string $description, string $headquarters, string $symbol, array $traits)
    {
        $this->name = $name;
        $this->description = $description;
        $this->headquarters = $headquarters;
        $this->symbol = $symbol;
        $this->traits = $traits;
    }

    public static function fromResponse(array $responseJSON): self
    {
        return new self(
            $responseJSON['name'],
            $responseJSON['description'],
            $responseJSON['headquarters'],
            $responseJSON['symbol'],
            array_map(fn($traitJSON) => FactionTrait::fromResponse($traitJSON), $responseJSON['traits'])
        );
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getHeadquarters(): string
    {
        return $this->headquarters;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getTraits(): array
    {
        return $this->traits;
    }
}
