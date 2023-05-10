<?php
/**
 * Register201ResponseData
 */
namespace App\Models;

/**
 * Register201ResponseData
 */
class Register201ResponseData {

    /** @var \App\Models\Agent $agent */
    public $agent;

    /** @var \App\Models\Contract $contract */
    public $contract;

    /** @var \App\Models\Faction $faction */
    public $faction;

    /** @var \App\Models\Ship $ship */
    public $ship;

    /** @var string $token A Bearer token for accessing secured API endpoints.*/
    public $token = "";

}
