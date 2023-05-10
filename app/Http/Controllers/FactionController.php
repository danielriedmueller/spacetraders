<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Http\Request\EntityFetcher;
use App\Models\Faction;
use Illuminate\Http\Request;

class FactionController extends Controller
{
    private EntityFetcher $fetcher;

    public function __construct(EntityFetcher $fetcher)
    {
        $this->fetcher = $fetcher;
    }

    /**
     * @throws InvalidRequestException
     */
    public function index()
    {
        return view('faction.index', [
            'factions' => $this->fetcher->fetchEntities('factions', Faction::class),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Faction $faction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faction $faction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faction $faction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faction $faction)
    {
        //
    }
}
