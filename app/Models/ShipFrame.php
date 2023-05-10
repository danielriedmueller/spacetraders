<?php
/**
 * ShipFrame
 */
namespace App\Models;

/**
 * ShipFrame
 * @description The frame of the ship. The frame determines the number of modules and mounting points of the ship, as well as base fuel capacity. As the condition of the frame takes more wear, the ship will become more sluggish and less maneuverable.
 */
class ShipFrame {

    /** @var string $symbol */
    public $symbol = "";

    /** @var string $name */
    public $name = "";

    /** @var string $description */
    public $description = "";

    /** @var int $condition Condition is a range of 0 to 100 where 0 is completely worn out and 100 is brand new.*/
    public $condition = 0;

    /** @var int $moduleSlots */
    public $moduleSlots = 0;

    /** @var int $mountingPoints */
    public $mountingPoints = 0;

    /** @var int $fuelCapacity */
    public $fuelCapacity = 0;

    /** @var \App\Models\ShipRequirements $requirements */
    public $requirements;

}
