<?php
/**
 * ShipyardShip
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * ShipyardShip
 * @description
 */
class ShipyardShip extends EntityModel {

    /** @var string $type */
    public $type = "";

    /** @var string $name */
    public $name = "";

    /** @var string $description */
    public $description = "";

    /** @var int $purchasePrice */
    public $purchasePrice = 0;

    /** @var \App\Models\ShipFrame $frame */
    public $frame;

    /** @var \App\Models\ShipReactor $reactor */
    public $reactor;

    /** @var \App\Models\ShipEngine $engine */
    public $engine;

    /** @var \App\Models\ShipModule[] $modules */
    public $modules = [];

    /** @var \App\Models\ShipMount[] $mounts */
    public $mounts = [];

    protected function modules(): Attribute
    {
        return Attribute::make(
            get: fn(array $value) => array_map(fn ($value) => $this->valueTransfomer($value, ShipModule::class), $value),
        );
    }

    protected function mounts(): Attribute
    {
        return Attribute::make(
            get: fn(array $value) => array_map(fn ($value) => $this->valueTransfomer($value, ShipMount::class), $value),
        );
    }
}
