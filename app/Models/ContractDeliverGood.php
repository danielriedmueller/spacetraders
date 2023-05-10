<?php
/**
 * ContractDeliverGood
 */
namespace App\Models;

/**
 * ContractDeliverGood
 * @description The details of a delivery contract. Includes the type of good, units needed, and the destination.
 */
class ContractDeliverGood {

    /** @var string $tradeSymbol The symbol of the trade good to deliver.*/
    public $tradeSymbol = "";

    /** @var string $destinationSymbol The destination where goods need to be delivered.*/
    public $destinationSymbol = "";

    /** @var int $unitsRequired The number of units that need to be delivered on this contract.*/
    public $unitsRequired = 0;

    /** @var int $unitsFulfilled The number of units fulfilled on this contract.*/
    public $unitsFulfilled = 0;

}
