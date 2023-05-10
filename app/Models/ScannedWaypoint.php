<?php
/**
 * ScannedWaypoint
 */
namespace App\Models;

/**
 * ScannedWaypoint
 * @description A waypoint is a location that ships can travel to such as a Planet, Moon or Space Station.
 */
class ScannedWaypoint {

    /** @var string $symbol */
    public $symbol = "";

    /** @var string $type */
    public $type = "";

    /** @var string $systemSymbol */
    public $systemSymbol = "";

    /** @var int $x */
    public $x = 0;

    /** @var int $y */
    public $y = 0;

    /** @var \App\Models\WaypointOrbital[] $orbitals */
    public $orbitals = [];

    /** @var \App\Models\WaypointFaction $faction */
    public $faction;

    /** @var \App\Models\WaypointTrait[] $traits The traits of the waypoint.*/
    public $traits = [];

    /** @var \App\Models\Chart $chart */
    public $chart;

}
