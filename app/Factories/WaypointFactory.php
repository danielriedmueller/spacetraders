<?php

namespace App\Factories;

use App\Models\STrait;
use App\Models\Waypoint;
use App\Storage\ImageStorage;

class WaypointFactory
{
    private ImageStorage $imageStorage;

    public function __construct(ImageStorage $imageStorage)
    {
        $this->imageStorage = $imageStorage;
    }

    public function createWaypointFromCoordinates(string $coordinates): Waypoint
    {
        return $this->createWaypoint(['symbol' => $coordinates]);
    }

    public function createWaypoint(array $data): Waypoint
    {
        return new Waypoint(
            $this->imageStorage->retrieve($this->generateImageName($data['symbol'])),
            $data['symbol'],
            $data['type'] ?? null,
            $data['x'] ?? null,
            $data['y'] ?? null,
            $this->createWaypoints($data['orbitals'] ?? []) ?? [],
            $data['factionSymbol'] ?? null,
            isset($data['traits']) ? array_map(fn($traitData) => STrait::fromResponse($traitData), $data['traits']) : []
        );
    }

    /**
     * @return Waypoint[]
     */
    public function createWaypoints(array $data): array
    {
        return array_map(fn($data) => $this->createWaypoint($data), $data);
    }

    private function generateImageName(string $symbol): string
    {
        return 'waypoint/waypoint-' . str_replace(' ', '-', strtolower($symbol)) . '.png';
    }
}
