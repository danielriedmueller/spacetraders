<?php

namespace App\Models;

class Waypoint
{
    private string $symbol;
    private ?string $type;
    private ?string $x;
    private ?string $y;

    /** @var Waypoint[] */
    private array $orbitals;
    private ?string $factionSymbol;

    /** @var STrait[] */
    private array $traits;
    private ?string $imagePath;

    public function __construct(
        string $symbol,
        ?string $type,
        ?string $x,
        ?string $y,
        array  $orbitals,
        ?string $factionSymbol,
        array  $traits,
        ?string $imagePath,
    )
    {
        $this->symbol = $symbol;
        $this->type = $type;
        $this->x = $x;
        $this->y = $y;
        $this->orbitals = $orbitals;
        $this->factionSymbol = $factionSymbol;
        $this->traits = $traits;
        $this->imagePath = $imagePath;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getX(): ?string
    {
        return $this->x;
    }

    public function getY(): ?string
    {
        return $this->y;
    }

    public function getOrbitals(): array
    {
        return $this->orbitals;
    }

    public function getFactionSymbol(): ?string
    {
        return $this->factionSymbol;
    }

    public function getTraits(): array
    {
        return $this->traits;
    }

    public function getImagePath(): string
    {
        return $this->imagePath ?? '';
    }
}
