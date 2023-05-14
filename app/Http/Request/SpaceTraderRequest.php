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
    public function post(string $url, array $params = []): array
    {
        $response = Http::withToken(config('spacetrader.key'))->post(config('spacetrader.api') . '/' . $url, $params);

        if ($response->failed()) {
            if ($response->status() === HttpFoundationResponse::HTTP_UNAUTHORIZED) {
                throw new InvalidRequestException("401 Unauthorized. Please check for valid token for SpaceTrader API.");
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
        $response = Http::withToken(config('spacetrader.key'))->get(config('spacetrader.api') . '/' . $url, $params);

        if ($response->failed()) {
            if ($response->status() === HttpFoundationResponse::HTTP_UNAUTHORIZED) {
                throw new InvalidRequestException("401 Unauthorized. Please check for valid token for SpaceTrader API.");
            } else {
                throw new InvalidRequestException($response->body());
            }
        }

        return $response->json();
    }

    public function patch(string $url, array $params)
    {
        $response = Http::withToken(config('spacetrader.key'))->patch(config('spacetrader.api') . '/' . $url, $params);

        if ($response->failed()) {
            if ($response->status() === HttpFoundationResponse::HTTP_UNAUTHORIZED) {
                throw new InvalidRequestException("401 Unauthorized. Please check for valid token for SpaceTrader API.");
            } else {
                throw new InvalidRequestException($response->body());
            }
        }

        return $response->json();
    }
}
