<?php
/**
 * Agent
 */
namespace App\Models;

/**
 * Agent
 * @description
 */
class Agent extends ImageModel {

    /** @var string $accountId */
    public $accountId = "";

    /** @var string $symbol */
    public $symbol = "";

    /** @var string $headquarters The headquarters of the agent.*/
    public $headquarters = "";

    /** @var int $credits The number of credits the agent has available. Credits can be negative if funds have been overdrawn.*/
    public $credits = 0;

    public function getImageName(): string
    {
        return 'agent-' . str_replace(' ', '-', strtolower($this->symbol)) . '.png';
    }

    public function getImagePrompt(): string
    {
        return 'A spacefarer';
    }
}
