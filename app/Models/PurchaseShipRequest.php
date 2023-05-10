<?php
/**
 * PurchaseShipRequest
 */
namespace App\Models;

/**
 * PurchaseShipRequest
 */
class PurchaseShipRequest {

    /** @var string $shipType */
    public $shipType = "";

    /** @var string $waypointSymbol The symbol of the waypoint you want to purchase the ship at.*/
    public $waypointSymbol = "";

}
