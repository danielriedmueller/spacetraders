<?php
/**
 * ContractTerms
 */
namespace App\Models;

/**
 * ContractTerms
 */
class ContractTerms {

    /** @var \DateTime $deadline The deadline for the contract.*/
    public $deadline;

    /** @var \App\Models\ContractPayment $payment */
    public $payment;

    /** @var \App\Models\ContractDeliverGood[] $deliver */
    public $deliver = [];

}
