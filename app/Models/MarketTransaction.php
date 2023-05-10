<?php
/**
 * MarketTransaction
 */
namespace App\Models;

/**
 * MarketTransaction
 */
class MarketTransaction {

    /** @var string $waypointSymbol The symbol of the waypoint where the transaction took place.*/
    public $waypointSymbol = "";

    /** @var string $shipSymbol The symbol of the ship that made the transaction.*/
    public $shipSymbol = "";

    /** @var string $tradeSymbol The symbol of the trade good.*/
    public $tradeSymbol = "";

    /** @var string $type The type of transaction.*/
    public $type = "";

    /** @var int $units The number of units of the transaction.*/
    public $units = 0;

    /** @var int $pricePerUnit The price per unit of the transaction.*/
    public $pricePerUnit = 0;

    /** @var int $totalPrice The total price of the transaction.*/
    public $totalPrice = 0;

    /** @var \DateTime $timestamp The timestamp of the transaction.*/
    public $timestamp;

}
