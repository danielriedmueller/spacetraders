<?php
/**
 * ShipMount
 */
namespace App\Models;

/**
 * ShipMount
 * @description A mount is installed on the exterier of a ship.
 */
class ShipMount {

    /** @var string $symbol */
    public $symbol = "";

    /** @var string $name */
    public $name = "";

    /** @var string $description */
    public $description = "";

    /** @var int $strength */
    public $strength = 0;

    /** @var string[] $deposits */
    public $deposits = [];

    /** @var \App\Models\ShipRequirements $requirements */
    public $requirements;

}
