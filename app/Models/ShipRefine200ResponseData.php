<?php
/**
 * ShipRefine200ResponseData
 */
namespace App\Models;

/**
 * ShipRefine200ResponseData
 */
class ShipRefine200ResponseData {

    /** @var \App\Models\ShipCargo $cargo */
    public $cargo;

    /** @var \App\Models\Cooldown $cooldown */
    public $cooldown;

    /** @var \App\Models\ShipRefine200ResponseDataProducedInner[] $produced */
    public $produced = [];

    /** @var \App\Models\ShipRefine200ResponseDataProducedInner[] $consumed */
    public $consumed = [];

}
