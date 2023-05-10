<?php

namespace App\Models;

class FactionTrait
{
    private string $name;
    private string $description;
    private string $symbol;

    private function __construct(string $name, string $description, string $symbol)
    {
        $this->name = $name;
        $this->description = $description;
        $this->symbol = $symbol;
    }

    public static function fromResponse(array $responseJSON): self
    {
        return new self(
            $responseJSON['name'],
            $responseJSON['description'],
            $responseJSON['symbol']
        );
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
