<?php
/**
 * ContractPayment
 */
namespace App\Models;

/**
 * ContractPayment
 */
class ContractPayment {

    /** @var int $onAccepted The amount of credits received up front for accepting the contract.*/
    public $onAccepted = 0;

    /** @var int $onFulfilled The amount of credits received when the contract is fulfilled.*/
    public $onFulfilled = 0;

}
