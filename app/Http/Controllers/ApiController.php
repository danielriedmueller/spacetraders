<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Http\Request\EntityFetcher;
use App\Models\Agent;
use App\Models\Faction;
use App\Models\Waypoint as WaypointModel;

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
    public function faction($symbol): object
    {
        $cacheName = 'faction-' . $symbol;
        if ($cached = cache($cacheName)) {
            return $cached;
        }

        $faction = $this->fetcher->fetchEntity('factions/' . $symbol, Faction::class);
        cache([$cacheName => $faction]);

        return $faction;
    }

    /**
     * @throws InvalidRequestException
     */
    public function agent(): object
    {
        $cacheName = 'myAgent';
        if ($cached = cache($cacheName)) {
            return $cached;
        }

        $myAgent = $this->fetcher->fetchEntity('/my/agent', Agent::class);
        cache([$cacheName => $myAgent]);

        return $myAgent;
    }

    /**
     * @throws InvalidRequestException
     */
    public function waypoint($symbol): object
    {
        $cacheName = 'waypoint-' . $symbol;
        if ($cached = cache($cacheName)) {
            return $cached;
        }

        $symbolParts = explode('-', $symbol);

        if (sizeof($symbolParts) !== 3) {
            throw new InvalidRequestException('Invalid symbol');
        }

        $systemSymbol = $symbolParts[0] . '-' . $symbolParts[1];
        $url = sprintf('systems/%s/waypoints/%s', $systemSymbol, $symbol);

        $waypoint = $this->fetcher->fetchEntity($url, WaypointModel::class);
        cache([$cacheName => $waypoint]);

        return $waypoint;
    }
}
