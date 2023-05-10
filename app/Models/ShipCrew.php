<?php
/**
 * ShipCrew
 */
namespace App\Models;

/**
 * ShipCrew
 * @description The ship's crew service and maintain the ship's systems and equipment.
 */
class ShipCrew {

    /** @var int $current The current number of crew members on the ship.*/
    public $current = 0;

    /** @var int $required The minimum number of crew members required to maintain the ship.*/
    public $required = 0;

    /** @var int $capacity The maximum number of crew members the ship can support.*/
    public $capacity = 0;

    /** @var string $rotation The rotation of crew shifts. A stricter shift improves the ship&#39;s performance. A more relaxed shift improves the crew&#39;s morale.*/
    public $rotation = ROTATION::STRICT;

    /** @var int $morale A rough measure of the crew&#39;s morale. A higher morale means the crew is happier and more productive. A lower morale means the ship is more prone to accidents.*/
    public $morale = 0;

    /** @var int $wages The amount of credits per crew member paid per hour. Wages are paid when a ship docks at a civilized waypoint.*/
    public $wages = 0;

}
