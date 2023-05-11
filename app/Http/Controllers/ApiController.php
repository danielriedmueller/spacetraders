<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Http\Request\EntityFetcher;
use App\Models\Agent;
use App\Models\Faction;
use App\Models\Waypoint as WaypointModel;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    private EntityFetcher $fetcher;

    public function __construct(EntityFetcher $fetcher)
    {
        $this->fetcher = $fetcher;
    }

    /**
     * @throws InvalidRequestException
     */
    public function factions(): array
    {
        return $this->fetcher->fetchEntities('factions', Faction::class);
    }

    /**
     * @throws InvalidRequestException
     */
    public function agent(): Object
    {
        return $this->fetcher->fetchEntity('/my/agent', Agent::class);
    }

    /**
     * @throws InvalidRequestException
     */
    public function waypoint($symbol): Object
    {
        $symbolParts = explode('-', $symbol);

        if (sizeof($symbolParts) !== 3) {
            throw new InvalidRequestException('Invalid symbol');
        }

        $systemSymbol = $symbolParts[0] . '-' . $symbolParts[1];
        $url = sprintf('systems/%s/waypoints/%s', $systemSymbol, $symbol);

        return $this->fetcher->fetchEntity($url, WaypointModel::class);
    }
}
