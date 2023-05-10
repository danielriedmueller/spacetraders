<?php
/**
 * Chart
 */
namespace App\Models;

/**
 * Chart
 * @description The chart of a system or waypoint, which makes the location visible to other agents.
 */
class Chart {

    /** @var string $waypointSymbol */
    public $waypointSymbol = "";

    /** @var string $submittedBy */
    public $submittedBy = "";

    /** @var \DateTime $submittedOn */
    public $submittedOn;

}
