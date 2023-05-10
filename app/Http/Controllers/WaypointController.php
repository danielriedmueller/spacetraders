<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Http\Request\WaypointFetcher;

class WaypointController extends Controller
{
    private WaypointFetcher $fetcher;

    public function __construct(WaypointFetcher $fetcher)
    {
        $this->fetcher = $fetcher;
    }

    /**
     * Display the specified resource.
     * @throws InvalidRequestException
     */
    public function show(string $symbol)
    {
        return view('waypoint.show', [
            'waypoint' => $this->fetcher->fetchWaypoint($symbol)
        ]);
    }
}
