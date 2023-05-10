<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidRequestException;
use App\Http\Request\FactionFetcher;
use App\Models\Faction;
use Illuminate\Http\Request;

class FactionController extends Controller
{
    private FactionFetcher $factionFetcher;

    public function __construct(FactionFetcher $factionFetcher)
    {
        $this->factionFetcher = $factionFetcher;
    }

    /**
     * @throws InvalidRequestException
     */
    public function index()
    {
        return view('faction.index', [
            'factions' => $this->factionFetcher->fetchFactions()
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
