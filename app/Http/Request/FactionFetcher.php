<?php

namespace App\Http\Request;

use App\Exceptions\InvalidRequestException;
use App\Models\Faction;
use App\Storage\ImageStorage;

class FactionFetcher
{
    private SpaceTraderRequest $httpRequest;
    private ImageStorage $imageStorage;

    public function __construct(SpaceTraderRequest $httpRequest, ImageStorage $imageStorage)
    {
        $this->httpRequest = $httpRequest;
        $this->imageStorage = $imageStorage;
    }

    /**
     * @throws InvalidRequestException
     */
    public function fetchFactions(): array
    {
        return array_map(function($responseJSON) {
            $factionName = $responseJSON['name'];
            $imageName = 'faction/faction-' . str_replace(' ', '-', strtolower($factionName)) . '.png';
            $responseJSON['image'] = $this->imageStorage->retrieve($imageName);

            return Faction::fromResponse($responseJSON);
        }, $this->httpRequest->get("factions")['data']);
    }
}
