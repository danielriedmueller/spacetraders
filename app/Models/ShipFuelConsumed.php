<?php
/**
 * ShipFuelConsumed
 */
namespace App\Models;

/**
 * ShipFuelConsumed
 */
class ShipFuelConsumed {

    /** @var int $amount The amount of fuel consumed by the most recent transit or action.*/
    public $amount = 0;

    /** @var \DateTime $timestamp The time at which the fuel was consumed.*/
    public $timestamp;

}
