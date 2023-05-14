<?php
/**
 * Contract
 */
namespace App\Models;

/**
 * Contract
 * @description
 */
class Contract extends EntityModel {

    /** @var string $id */
    public $id = "";

    /** @var string $factionSymbol The symbol of the faction that this contract is for.*/
    public $factionSymbol = "";

    /** @var string $type */
    public $type = "";

    /** @var \App\Models\ContractTerms $terms */
    public $terms;

    /** @var bool $accepted Whether the contract has been accepted by the agent*/
    public $accepted = false;

    /** @var bool $fulfilled Whether the contract has been fulfilled*/
    public $fulfilled = false;

    /** @var \DateTime $expiration The time at which the contract expires*/
    public $expiration;

}
