<?php
/**
 * JumpGate
 */
namespace App\Models;

/**
 * JumpGate
 * @description
 */
class JumpGate {

    /** @var float $jumpRange The maximum jump range of the gate.*/
    public $jumpRange = 0;

    /** @var string $factionSymbol The symbol of the faction that owns the gate.*/
    public $factionSymbol = "";

    /** @var \App\Models\ConnectedSystem[] $connectedSystems The systems within range of the gate that have a corresponding gate.*/
    public $connectedSystems = [];

}
