<?php
/**
 * System
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * System
 * @description
 */
class System extends EntityModel {

    /** @var string $symbol */
    public $symbol = "";

    /** @var string $sectorSymbol */
    public $sectorSymbol = "";

    /** @var string $type */
    public $type = "";

    /** @var int $x */
    public $x = 0;

    /** @var int $y */
    public $y = 0;

    protected function waypoints(): Attribute
    {
        return Attribute::make(
            get: fn(array $value) => array_map(fn ($value) => $this->valueTransfomer($value, Waypoint::class), $value),
        );
    }

    protected function factions(): Attribute
    {
        return Attribute::make(
            get: fn(array $value) => array_map(fn ($value) => $this->valueTransfomer($value, Faction::class), $value),
        );
    }
}
