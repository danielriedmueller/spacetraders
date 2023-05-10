<?php

namespace App\Http\Request;

use Illuminate\Http\Client\Response;

interface IRequest
{
    public function get(string $url, array $queryParams = []): array;
    public function post(string $url, array $queryParams = []): array;
}
