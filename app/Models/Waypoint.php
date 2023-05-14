<?php
/**
 * Waypoint
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * Waypoint
 * @description A waypoint is a location that ships can travel to such as a Planet, Moon or Space Station.
 */
class Waypoint extends ImageModel
{
    /** @var string $symbol */
    public $symbol = "";

    /** @var string $type */
    public $type = "";

    /** @var string $systemSymbol */
    public $systemSymbol = "";

    /** @var int $x */
    public $x = 0;

    /** @var int $y */
    public $y = 0;

    protected function orbitals(): Attribute
    {
        return Attribute::make(
            get: fn(array $value) => array_map(fn ($value) => $this->valueTransfomer($value, WaypointOrbital::class), $value),
        );
    }

    protected function faction(): Attribute
    {
        return Attribute::make(
            get: fn (array $value) => $this->valueTransfomer($value, WaypointFaction::class),
        );
    }

    protected function chart(): Attribute
    {
        return Attribute::make(
            get: fn (array $value) => $this->valueTransfomer($value, Chart::class),
        );
    }

    protected function traits(): Attribute
    {
        return Attribute::make(
            get: fn(array $value) => array_map(fn ($value) => $this->valueTransfomer($value, WaypointTrait::class), $value),
        );
    }

    public function getImageName(): string
    {
        return 'waypoint/waypoint-' . str_replace(' ', '-', strtolower($this->symbol)) . '.png';
    }

    public function getImagePrompt(): string
    {
        $type = $this->type;
        $traits = implode(', ', array_map(fn($trait) => $trait->name, $this->traits));

        return "A $type in space with following traits: $traits";
    }
}
