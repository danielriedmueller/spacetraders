<?php

namespace App\Http\Request;

use App\Exceptions\InvalidRequestException;
use App\Factories\EntityFactory;

class EntityDeliverer
{
    private SpaceTraderRequest $httpRequest;

    public function __construct(SpaceTraderRequest $httpRequest)
    {
        $this->httpRequest = $httpRequest;
    }

    /**
     * @throws InvalidRequestException
     */
    public function deliver(string $url, array $data): array
    {
        $responseJSON = $this->httpRequest->post($url, $data);

        return $responseJSON;
    }
}
