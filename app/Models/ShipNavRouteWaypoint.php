<?php
/**
 * ShipNavRouteWaypoint
 */
namespace App\Models;

/**
 * ShipNavRouteWaypoint
 * @description The destination or departure of a ships nav route.
 */
class ShipNavRouteWaypoint {

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

}
