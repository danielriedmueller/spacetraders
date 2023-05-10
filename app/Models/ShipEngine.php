<?php
/**
 * ShipEngine
 */
namespace App\Models;

/**
 * ShipEngine
 * @description The engine determines how quickly a ship travels between waypoints.
 */
class ShipEngine {

    /** @var string $symbol */
    public $symbol = "";

    /** @var string $name */
    public $name = "";

    /** @var string $description */
    public $description = "";

    /** @var int $condition Condition is a range of 0 to 100 where 0 is completely worn out and 100 is brand new.*/
    public $condition = 0;

    /** @var float $speed */
    public $speed = 0;

    /** @var \App\Models\ShipRequirements $requirements */
    public $requirements;

}
