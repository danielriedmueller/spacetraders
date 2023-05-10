<?php
/**
 * Shipyard
 */
namespace App\Models;

/**
 * Shipyard
 * @description
 */
class Shipyard {

    /** @var string $symbol The symbol of the shipyard. The symbol is the same as the waypoint where the shipyard is located.*/
    public $symbol = "";

    /** @var \App\Models\ShipyardShipTypesInner[] $shipTypes The list of ship types available for purchase at this shipyard.*/
    public $shipTypes = [];

    /** @var \App\Models\ShipyardTransaction[] $transactions The list of recent transactions at this shipyard.*/
    public $transactions = [];

    /** @var \App\Models\ShipyardShip[] $ships The ships that are currently available for purchase at the shipyard.*/
    public $ships = [];

}
