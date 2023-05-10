<?php
/**
 * ShipNavRoute
 */
namespace App\Models;

/**
 * ShipNavRoute
 * @description The routing information for the ship's most recent transit or current location.
 */
class ShipNavRoute {

    /** @var \App\Models\ShipNavRouteWaypoint $destination */
    public $destination;

    /** @var \App\Models\ShipNavRouteWaypoint $departure */
    public $departure;

    /** @var \DateTime $departureTime The date time of the ship&#39;s departure.*/
    public $departureTime;

    /** @var \DateTime $arrival The date time of the ship&#39;s arrival. If the ship is in-transit, this is the expected time of arrival.*/
    public $arrival;

}
