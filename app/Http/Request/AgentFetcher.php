<?php

namespace App\Http\Request;

use App\Exceptions\InvalidRequestException;
use App\Factories\WaypointFactory;
use App\Models\MyAgent;

class AgentFetcher
{
    private SpaceTraderRequest $httpRequest;
    private WaypointFactory $waypointFactory;

    public function __construct(SpaceTraderRequest $httpRequest, WaypointFactory $waypointFactory)
    {
        $this->httpRequest = $httpRequest;
        $this->waypointFactory = $waypointFactory;
    }

    /**
     * @throws InvalidRequestException
     */
    public function fetchMyAgent(): MyAgent
    {
        $responseJSON = $this->httpRequest->get("my/agent")['data'];

        return new MyAgent(
            $responseJSON['symbol'],
            $this->waypointFactory->createWaypointFromCoordinates($responseJSON['headquarters']),
            $responseJSON['credits'],
        );
    }
}
