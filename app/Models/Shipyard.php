<?php
/**
 * Shipyard
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * Shipyard
 * @description
 */
class Shipyard extends ImageModel {

    /** @var string $symbol The symbol of the shipyard. The symbol is the same as the waypoint where the shipyard is located.*/
    public $symbol = "";

    /** @var \App\Models\ShipyardShipTypesInner[] $shipTypes The list of ship types available for purchase at this shipyard.*/
    public $shipTypes = [];

    protected function transactions(): Attribute
    {
        return Attribute::make(
            get: fn(array $value) => array_map(fn ($value) => $this->valueTransfomer($value, ShipyardTransaction::class), $value),
        );
    }

    protected function ships(): Attribute
    {
        return Attribute::make(
            get: fn(array $value) => array_map(fn ($value) => $this->valueTransfomer($value, ShipyardShip::class), $value),
        );
    }

    public function getImageName(): string
    {
        return 'shipyard/shipyard-' . str_replace(' ', '-', strtolower($this->symbol)) . '.png';
    }

    public function getImagePrompt(): string
    {
        //$shipCount = count($this->ships);
        $shipCount = 0;

        return "Shipyard for spaceships in space with $shipCount ships docked";
    }
}
