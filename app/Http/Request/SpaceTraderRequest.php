<?php

namespace App\Http\Request;

use App\Exceptions\InvalidRequestException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class SpaceTraderRequest implements IRequest
{
    /**
     * @throws InvalidRequestException
     */
    public function post(string $url, array $params = []): Response
    {
        $response = Http::withToken(config('api.key'))->post(config('api.host') . '/' . $url, $params);

        if ($response->failed()) {
            if ($response->status() === HttpFoundationResponse::HTTP_UNAUTHORIZED) {
                throw new InvalidRequestException("401 Unauthorized. Please check for valid token for API.");
            } else {
                throw new InvalidRequestException($response->body());
            }
        }

        return $response;
    }

    /**
     * @throws InvalidRequestException
     */
    public function get(string $url, array $params = []): array
    {
        $response = Http::withToken(config('api.key'))->get(config('api.host') . '/' . $url, $params);

        if ($response->failed()) {
            if ($response->status() === HttpFoundationResponse::HTTP_UNAUTHORIZED) {
                throw new InvalidRequestException("401 Unauthorized. Please check for valid token for API.");
            } else {
                throw new InvalidRequestException($response->body());
            }
        }

        return $response->json();
    }
}
