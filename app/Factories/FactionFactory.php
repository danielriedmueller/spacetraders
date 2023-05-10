<?php

namespace App\Factories;

use App\Exceptions\InvalidRequestException;
use App\Models\Faction;
use App\Models\STrait;
use App\Storage\ImageStorage;

class FactionFactory
{
    private ImageStorage $imageStorage;
    private WaypointFactory $waypointFactory;

    public function __construct(ImageStorage $imageStorage, WaypointFactory $waypointFactory)
    {
        $this->imageStorage = $imageStorage;
        $this->waypointFactory = $waypointFactory;
    }

    /**
     * @throws InvalidRequestException
     */
    public function createFaction(array $data): Faction
    {
        return new Faction(
            $this->imageStorage->retrieve($this->generateImageName($data['name'])),
            $data['name'],
            $data['description'],
            $this->waypointFactory->createWaypointFromCoordinates($data['headquarters']),
            $data['symbol'],
            array_map(fn($traitData) => STrait::fromResponse($traitData), $data['traits'])
        );
    }

    /**
     * @return Faction[]
     */
    public function createFactions(array $data): array
    {
        return array_map(fn($data) => $this->createFaction($data), $data);
    }

    private function generateImageName(string $factionName): string
    {
        return 'faction/faction-' . str_replace(' ', '-', strtolower($factionName)) . '.png';
    }
}
