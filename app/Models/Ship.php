<?php
/**
 * Ship
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * Ship
 * @description A ship
 */
class Ship extends ImageModel {

    /** @var string $symbol The globally unique identifier of the ship in the following format: &#x60;[AGENT_SYMBOL]_[HEX_ID]&#x60;*/
    public $symbol = "";

    /** @var \App\Models\ShipRegistration $registration */
    public $registration;

    /** @var \App\Models\ShipNav $nav */
    public $nav;

    /** @var \App\Models\ShipCrew $crew */
    public $crew;

    /** @var \App\Models\ShipFrame $frame */
    public $frame;

    /** @var \App\Models\ShipReactor $reactor */
    public $reactor;

    /** @var \App\Models\ShipEngine $engine */
    public $engine;

    /** @var \App\Models\ShipCargo $cargo */
    public $cargo;

    /** @var \App\Models\ShipFuel $fuel */
    public $fuel;

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

    public function getImageConfig(): array
    {
        return [
            'name' => 'ship/ship-' . str_replace(' ', '-', strtolower($this->symbol)) . '.png',
            'prompt' => 'Spaceship with role ' . $this->registration['role'],
            'size' => 220,
        ];
    }
}
