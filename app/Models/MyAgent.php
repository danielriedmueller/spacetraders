<?php

namespace App\Models;

class MyAgent
{
    private string $symbol;
    private Waypoint $headquarters;
    private int $credits;

    public function __construct(string $symbol, Waypoint $headquarters, int $credits)
    {
        $this->symbol = $symbol;
        $this->headquarters = $headquarters;
        $this->credits = $credits;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getHeadquarters(): Waypoint
    {
        return $this->headquarters;
    }

    public function getCredits(): int
    {
        return $this->credits;
    }
}
