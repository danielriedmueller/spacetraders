<?php

namespace App\Models;

class Faction
{
    private string $name;
    private string $description;
    private Waypoint $headquarters;
    private string $symbol;
    private string $imagePath;

    /**
     * @var STrait[]
     */
    private array $traits;

    public function __construct(
        string   $imagePath,
        string   $name,
        string   $description,
        Waypoint $headquarters,
        string   $symbol,
        array    $traits
    )
    {
        $this->name = $name;
        $this->description = $description;
        $this->headquarters = $headquarters;
        $this->symbol = $symbol;
        $this->traits = $traits;
        $this->imagePath = $imagePath;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getHeadquarters(): Waypoint
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

    public function getImagePath(): string
    {
        return $this->imagePath;
    }
}
