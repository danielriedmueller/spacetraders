<?php
/**
 * System
 */
namespace App\Models;

/**
 * System
 * @description
 */
class System {

    /** @var string $symbol */
    public $symbol = "";

    /** @var string $sectorSymbol */
    public $sectorSymbol = "";

    /** @var string $type */
    public $type = "";

    /** @var int $x */
    public $x = 0;

    /** @var int $y */
    public $y = 0;

    /** @var \App\Models\SystemWaypoint[] $waypoints */
    public $waypoints = [];

    /** @var \App\Models\SystemFaction[] $factions */
    public $factions = [];

}
