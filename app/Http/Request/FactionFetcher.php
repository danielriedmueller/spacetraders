<?php

namespace App\Http\Request;

use App\Exceptions\InvalidRequestException;
use App\Models\Faction;

class FactionFetcher
{
    private SpaceTraderRequest $httpRequest;

    public function __construct(SpaceTraderRequest $httpRequest)
    {
        $this->httpRequest = $httpRequest;
    }

    /**
     * @throws InvalidRequestException
     */
    public function fetchFactions(): array
    {
        return array_map(fn($responseJSON) => Faction::fromResponse($responseJSON), $this->httpRequest->get("factions")['data']);
    }
}
