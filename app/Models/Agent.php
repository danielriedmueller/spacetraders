<?php
/**
 * Agent
 */
namespace App\Models;

/**
 * Agent
 * @description
 */
class Agent {

    /** @var string $accountId */
    public $accountId = "";

    /** @var string $symbol */
    public $symbol = "";

    /** @var string $headquarters The headquarters of the agent.*/
    public $headquarters = "";

    /** @var int $credits The number of credits the agent has available. Credits can be negative if funds have been overdrawn.*/
    public $credits = 0;

}
