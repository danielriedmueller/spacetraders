<?php

namespace App\Http\Request;

use App\Exceptions\InvalidRequestException;
use App\Factories\WaypointFactory;
use App\Models\Waypoint;

class WaypointFetcher
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
    public function fetchWaypoint(string $symbol): Waypoint
    {
        $symbolParts = explode('-', $symbol);

        if (sizeof($symbolParts) !== 3) {
            throw new InvalidRequestException('Invalid symbol');
        }

        $systemSymbol = $symbolParts[0] . '-' . $symbolParts[1];
        $url = sprintf('systems/%s/waypoints/%s', $systemSymbol, $symbol);

        $responseJSON = $this->httpRequest->get($url)['data'];

        return $this->waypointFactory->createWaypoint($responseJSON);
    }
}
