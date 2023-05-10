<?php
/**
 * ShipyardShip
 */
namespace App\Models;

/**
 * ShipyardShip
 * @description
 */
class ShipyardShip {

    /** @var string $type */
    public $type = "";

    /** @var string $name */
    public $name = "";

    /** @var string $description */
    public $description = "";

    /** @var int $purchasePrice */
    public $purchasePrice = 0;

    /** @var \App\Models\ShipFrame $frame */
    public $frame;

    /** @var \App\Models\ShipReactor $reactor */
    public $reactor;

    /** @var \App\Models\ShipEngine $engine */
    public $engine;

    /** @var \App\Models\ShipModule[] $modules */
    public $modules = [];

    /** @var \App\Models\ShipMount[] $mounts */
    public $mounts = [];

}
