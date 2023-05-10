<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class InvalidRequestException extends Exception
{
    protected $message = 'Invalid request';
}
