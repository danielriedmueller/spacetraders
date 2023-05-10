<?php
/**
 * Ship
 */
namespace App\Models;

/**
 * Ship
 * @description A ship
 */
class Ship {

    /** @var string $symbol The globally unique identifier of the ship in the following format: &#x60;[AGENT_SYMBOL]_[HEX_ID]&#x60;*/
    public $symbol = "";

    /** @var \App\Models\ShipRegistration $registration */
    public $registration;

    /** @var \App\Models\ShipNav $nav */
    public $nav;

    /** @var \App\Models\ShipCrew $crew */
    public $crew;

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

    /** @var \App\Models\ShipCargo $cargo */
    public $cargo;

    /** @var \App\Models\ShipFuel $fuel */
    public $fuel;

}
