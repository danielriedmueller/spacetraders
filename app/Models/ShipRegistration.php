<?php
/**
 * ShipRegistration
 */
namespace App\Models;

/**
 * ShipRegistration
 * @description The public registration information of the ship
 */
class ShipRegistration {

    /** @var string $name The agent&#39;s registered name of the ship*/
    public $name = "";

    /** @var string $factionSymbol The symbol of the faction the ship is registered with*/
    public $factionSymbol = "";

    /** @var string $role */
    public $role = "";

}
