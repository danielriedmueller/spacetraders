<?php
/**
 * ShipModule
 */
namespace App\Models;

/**
 * ShipModule
 * @description A module can be installed in a ship and provides a set of capabilities such as storage space or quarters for crew. Module installations are permanent.
 */
class ShipModule extends EntityModel {

    /** @var string $symbol */
    public $symbol = "";

    /** @var int $capacity */
    public $capacity = 0;

    /** @var int $range */
    public $range = 0;

    /** @var string $name */
    public $name = "";

    /** @var string $description */
    public $description = "";

    /** @var \App\Models\ShipRequirements $requirements */
    public $requirements;

}
