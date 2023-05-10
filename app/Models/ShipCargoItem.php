<?php
/**
 * ShipCargoItem
 */
namespace App\Models;

/**
 * ShipCargoItem
 * @description The type of cargo item and the number of units.
 */
class ShipCargoItem {

    /** @var string $symbol The unique identifier of the cargo item type.*/
    public $symbol = "";

    /** @var string $name The name of the cargo item type.*/
    public $name = "";

    /** @var string $description The description of the cargo item type.*/
    public $description = "";

    /** @var int $units The number of units of the cargo item.*/
    public $units = 0;

}
