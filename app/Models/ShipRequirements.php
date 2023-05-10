<?php
/**
 * ShipRequirements
 */
namespace App\Models;

/**
 * ShipRequirements
 * @description The requirements for installation on a ship
 */
class ShipRequirements {

    /** @var int $power The amount of power required from the reactor.*/
    public $power = 0;

    /** @var int $crew The number of crew required for operation.*/
    public $crew = 0;

    /** @var int $slots The number of module slots required for installation.*/
    public $slots = 0;

}
