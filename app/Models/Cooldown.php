<?php
/**
 * Cooldown
 */
namespace App\Models;

/**
 * Cooldown
 * @description A cooldown is a period of time in which a ship cannot perform certain actions.
 */
class Cooldown {

    /** @var string $shipSymbol The symbol of the ship that is on cooldown*/
    public $shipSymbol = "";

    /** @var int $totalSeconds The total duration of the cooldown in seconds*/
    public $totalSeconds = 0;

    /** @var int $remainingSeconds The remaining duration of the cooldown in seconds*/
    public $remainingSeconds = 0;

    /** @var \DateTime $expiration The date and time when the cooldown expires in ISO 8601 format*/
    public $expiration;

}
