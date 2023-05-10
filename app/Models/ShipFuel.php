<?php
/**
 * ShipFuel
 */
namespace App\Models;

/**
 * ShipFuel
 * @description Details of the ship's fuel tanks including how much fuel was consumed during the last transit or action.
 */
class ShipFuel {

    /** @var int $current The current amount of fuel in the ship&#39;s tanks.*/
    public $current = 0;

    /** @var int $capacity The maximum amount of fuel the ship&#39;s tanks can hold.*/
    public $capacity = 0;

    /** @var \App\Models\ShipFuelConsumed $consumed */
    public $consumed;

}
