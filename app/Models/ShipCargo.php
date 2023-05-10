<?php
/**
 * ShipCargo
 */
namespace App\Models;

/**
 * ShipCargo
 */
class ShipCargo {

    /** @var int $capacity The max number of items that can be stored in the cargo hold.*/
    public $capacity = 0;

    /** @var int $units The number of items currently stored in the cargo hold.*/
    public $units = 0;

    /** @var \App\Models\ShipCargoItem[] $inventory The items currently in the cargo hold.*/
    public $inventory = [];

}
