<?php

namespace App\Http\Request;

use App\Exceptions\InvalidRequestException;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class DallERequest implements IRequest
{
    /**
     * @throws InvalidRequestException
     */
    public function post(string $url, array $data = []): array
    {
        if (config('dalle.disabled')) {
            return [];
        }

        $response = Http::contentType('application/json')
            ->withToken(config('dalle.key'))
            ->post(config('dalle.api') . '/' . $url, $data);

        if ($response->failed()) {
            if ($response->status() === HttpFoundationResponse::HTTP_UNAUTHORIZED) {
                throw new InvalidRequestException("401 Unauthorized. Please check for valid token for Dall-E API.");
            } else {
                throw new InvalidRequestException($response->body());
            }
        }

        return $response->json();
    }

    /**
     * @throws InvalidRequestException
     */
    public function get(string $url, array $params = []): array
    {
        if (config('dalle.disabled')) {
            return [];
        }

        $response = Http::withToken(config('dalle.key'))->get(config('dalle.api') . '/' . $url, $params);

        if ($response->failed()) {
            if ($response->status() === HttpFoundationResponse::HTTP_UNAUTHORIZED) {
                throw new InvalidRequestException("401 Unauthorized. Please check for valid token for Dall-E API.");
            } else {
                throw new InvalidRequestException($response->body());
            }
        }

        return $response->json();
    }
}
