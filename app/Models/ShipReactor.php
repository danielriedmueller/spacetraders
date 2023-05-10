<?php
/**
 * ShipReactor
 */
namespace App\Models;

/**
 * ShipReactor
 * @description The reactor of the ship. The reactor is responsible for powering the ship's systems and weapons.
 */
class ShipReactor {

    /** @var string $symbol */
    public $symbol = "";

    /** @var string $name */
    public $name = "";

    /** @var string $description */
    public $description = "";

    /** @var int $condition Condition is a range of 0 to 100 where 0 is completely worn out and 100 is brand new.*/
    public $condition = 0;

    /** @var int $powerOutput */
    public $powerOutput = 0;

    /** @var \App\Models\ShipRequirements $requirements */
    public $requirements;

}
