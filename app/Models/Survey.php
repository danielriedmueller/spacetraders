<?php
/**
 * Survey
 */
namespace App\Models;

/**
 * Survey
 * @description A resource survey of a waypoint, detailing a specific extraction location and the types of resources that can be found there.
 */
class Survey {

    /** @var string $signature A unique signature for the location of this survey. This signature is verified when attempting an extraction using this survey.*/
    public $signature = "";

    /** @var string $symbol The symbol of the waypoint that this survey is for.*/
    public $symbol = "";

    /** @var \App\Models\SurveyDeposit[] $deposits A list of deposits that can be found at this location.*/
    public $deposits = [];

    /** @var \DateTime $expiration The date and time when the survey expires. After this date and time, the survey will no longer be available for extraction.*/
    public $expiration;

    /** @var string $size The size of the deposit. This value indicates how much can be extracted from the survey before it is exhausted.*/
    public $size = "";

}
