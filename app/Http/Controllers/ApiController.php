<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Http\Request\EntityDeliverer;
use App\Http\Request\EntityFetcher;
use App\Models\Agent;
use App\Models\Contract;
use App\Models\Faction;
use App\Models\Market;
use App\Models\Ship;
use App\Models\Shipyard;
use App\Models\System;
use App\Models\Waypoint as WaypointModel;

class ApiController extends Controller
{
    private EntityFetcher $fetcher;
    private EntityDeliverer $deliverer;

    public function __construct(EntityFetcher $fetcher, EntityDeliverer $deliverer)
    {
        $this->fetcher = $fetcher;
        $this->deliverer = $deliverer;
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

        $faction = $this->fetcher->fetchEntity("factions/$symbol", Faction::class);
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
        $myAgent->ships = $this->fetcher->fetchEntities('/my/ships', Ship::class);
        $myAgent->contracts = $this->fetcher->fetchEntities('/my/contracts', Contract::class);
        cache([$cacheName => $myAgent]);

        return $myAgent;
    }

    /**
     * @throws InvalidRequestException
     */
    public function ship($symbol): object
    {
        $cacheName = 'ship-' . $symbol;
        if ($cached = cache($cacheName)) {
            return $cached;
        }

        $ship = $this->fetcher->fetchEntity("my/ships/$symbol", Ship::class);
        cache([$cacheName => $ship]);

        return $ship;
    }

    public function contract($symbol): object
    {
        $cacheName = 'contract-' . $symbol;
        if ($cached = cache($cacheName)) {
            return $cached;
        }

        $item = $this->fetcher->fetchEntity("my/contracts/$symbol", Contract::class);
        if (!$item->accepted) {
            $item->actions = ['accept' => "my/contracts/$symbol/accept"];
        }

        cache([$cacheName => $item]);

        return $item;
    }

    public function acceptContract($symbol): void
    {
        $this->deliverer-> deliver("my/contracts/$symbol/accept", []);
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

    /**
     * @throws InvalidRequestException
     */
    public function system($symbol): Object
    {
        $cacheName = 'system-' . $symbol;
        if ($cached = cache($cacheName)) {
            return $cached;
        }

        $system = $this->fetcher->fetchEntity("systems/$symbol", System::class);
        cache([$cacheName => $system]);

        return $system;
    }

    /**
     * @throws InvalidRequestException
     */
    public function shipyard($systemSymbol, $waypointSymbol): Object
    {
        $cacheName = 'shipyard-' . $systemSymbol . '-' . $waypointSymbol;
        if ($cached = cache($cacheName)) {
            return $cached;
        }

        $system = $this->fetcher->fetchEntity("/systems/$systemSymbol/waypoints/$waypointSymbol/shipyard", Shipyard::class);
        cache([$cacheName => $system]);

        return $system;
    }

    /**
     * @throws InvalidRequestException
     */
    public function market($systemSymbol, $waypointSymbol): Object
    {
        $cacheName = 'market-' . $systemSymbol . '-' . $waypointSymbol;
        if ($cached = cache($cacheName)) {
            return $cached;
        }

        $system = $this->fetcher->fetchEntity("/systems/$systemSymbol/waypoints/$waypointSymbol/market", Market::class);
        cache([$cacheName => $system]);

        return $system;
    }
}
