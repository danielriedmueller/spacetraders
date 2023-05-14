<?php
/**
 * ShipyardTransaction
 */
namespace App\Models;

/**
 * ShipyardTransaction
 */
class ShipyardTransaction {

    /** @var string $waypointSymbol The symbol of the waypoint where the transaction took place.*/
    public $waypointSymbol = "";

    /** @var string $shipSymbol The symbol of the ship that was purchased.*/
    public $shipSymbol = "";

    /** @var int $price The price of the transaction.*/
    public $price = 0;

    /** @var string $agentSymbol The symbol of the agent that made the transaction.*/
    public $agentSymbol = "";

    /** @var \DateTime $timestamp The timestamp of the transaction.*/
    public $timestamp;

}
