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

    /** @var \App\Models\ShipyardTransaction[] $transactions The list of recent transactions at this shipyard.*/
    protected function transactions(): Attribute
    {
        return Attribute::make(
            get: fn(array $value) => array_map(fn ($value) => $this->valueTransfomer($value, ShipyardTransaction::class), $value),
        );
    }

    /** @var \App\Models\ShipyardShip[] $ships The ships that are currently available for purchase at the shipyard.*/
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
        $prompt = $this->type;
        $prompt .= ' ' . implode(' ', array_map(fn($trait) => $trait->name, $this->traits));
        $prompt .= ' ' . $this->faction->symbol;

        return $prompt;
    }
}
