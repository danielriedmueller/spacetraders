<?php

namespace App\Http\Request;

use App\Exceptions\InvalidRequestException;
use App\Factories\WaypointFactory;
use App\Models\Agent;
use voku\helper\ASCII;

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
    public function fetchMyAgent(): Agent
    {
        $responseJSON = $this->httpRequest->get("my/agent")['data'];
        $agent = new Agent();
        $agent->symbol = $responseJSON['symbol'];
        $agent->headquarters = $responseJSON['headquarters'];
        $agent->credits = $responseJSON['credits'];
        return $agent;

        return new Agent(
            $responseJSON['symbol'],
            $this->waypointFactory->createWaypointFromCoordinates($responseJSON['headquarters']),
            $responseJSON['credits'],
        );
    }
}
