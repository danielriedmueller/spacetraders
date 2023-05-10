<?php
/**
 * ScannedShip
 */
namespace App\Models;

/**
 * ScannedShip
 * @description The ship that was scanned. Details include information about the ship that could be detected by the scanner.
 */
class ScannedShip {

    /** @var string $symbol The globally unique identifier of the ship.*/
    public $symbol = "";

    /** @var \App\Models\ShipRegistration $registration */
    public $registration;

    /** @var \App\Models\ShipNav $nav */
    public $nav;

    /** @var \App\Models\ScannedShipFrame $frame */
    public $frame;

    /** @var \App\Models\ScannedShipReactor $reactor */
    public $reactor;

    /** @var \App\Models\ScannedShipEngine $engine */
    public $engine;

    /** @var \App\Models\ScannedShipMountsInner[] $mounts */
    public $mounts = [];

}
