<?php
/**
 * ConnectedSystem
 */
namespace App\Models;

/**
 * ConnectedSystem
 * @description
 */
class ConnectedSystem {

    /** @var string $symbol */
    public $symbol = "";

    /** @var string $sectorSymbol */
    public $sectorSymbol = "";

    /** @var string $type */
    public $type = "";

    /** @var string $factionSymbol The symbol of the faction that owns the connected jump gate in the system.*/
    public $factionSymbol = "";

    /** @var int $x */
    public $x = 0;

    /** @var int $y */
    public $y = 0;

    /** @var int $distance */
    public $distance = 0;

}
