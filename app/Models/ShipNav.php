<?php
/**
 * ShipNav
 */
namespace App\Models;

/**
 * ShipNav
 * @description The navigation information of the ship.
 */
class ShipNav {

    /** @var string $systemSymbol The system symbol of the ship&#39;s current location.*/
    public $systemSymbol = "";

    /** @var string $waypointSymbol The waypoint symbol of the ship&#39;s current location, or if the ship is in-transit, the waypoint symbol of the ship&#39;s destination.*/
    public $waypointSymbol = "";

    /** @var \App\Models\ShipNavRoute $route */
    public $route;

    /** @var string $status */
    public $status = "";

    /** @var string $flightMode */
    public $flightMode = \App\Models\ShipNavFlightMode::CRUISE;

}
