<?php

namespace App\Http\Request;

use App\Exceptions\InvalidRequestException;
use App\Factories\FactionFactory;

class FactionFetcher
{
    private SpaceTraderRequest $httpRequest;
    private FactionFactory $factionFactory;

    public function __construct(SpaceTraderRequest $httpRequest, FactionFactory $factionFactory)
    {
        $this->httpRequest = $httpRequest;
        $this->factionFactory = $factionFactory;
    }

    /**
     * @throws InvalidRequestException
     */
    public function fetchFactions(): array
    {
        return $this->factionFactory->createFactions($this->httpRequest->get("factions")['data']);
    }
}
