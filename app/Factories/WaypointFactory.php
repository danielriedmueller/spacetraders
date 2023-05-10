<?php

namespace App\Factories;

use App\Exceptions\InvalidRequestException;
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

    /**
     * @throws InvalidRequestException
     */
    public function createWaypointFromCoordinates(string $coordinates): Waypoint
    {
        return $this->createWaypoint(['symbol' => $coordinates]);
    }

    /**
     * @throws InvalidRequestException
     */
    public function createWaypoint(array $data): Waypoint
    {
        $imageName = $this->generateImageName($data['symbol']);
        $imagePath = $this->imageStorage->getImage($imageName);
        if (!$imagePath) {
            if ($promptData = $this->generateImagePrompt($data)) {
                $imagePath = $this->imageStorage->getOrCreateImage($imageName, $promptData);
            }
        }

        return new Waypoint(
            $data['symbol'],
            $data['type'] ?? null,
            $data['x'] ?? null,
            $data['y'] ?? null,
            $this->createWaypoints($data['orbitals'] ?? []) ?? [],
            $data['factionSymbol'] ?? null,
            isset($data['traits']) ? array_map(fn($traitData) => STrait::fromResponse($traitData), $data['traits']) : [],
            $imagePath,
        );
    }

    /**
     * @return Waypoint[]
     * @throws InvalidRequestException
     */
    public function createWaypoints(array $data): array
    {
        return array_map(fn($data) => $this->createWaypoint($data), $data);
    }

    private function generateImageName(string $symbol): string
    {
        return 'waypoint/waypoint-' . str_replace(' ', '-', strtolower($symbol)) . '.png';
    }

    private function generateImagePrompt(array $data): ?string
    {
        if (isset($data['type'])) {
            $prompt = $data['type'];

            if (isset($data['traits'])) {
                $prompt .= ' ' . implode(' ', array_map(fn($trait) => $trait['name'], $data['traits']));
            }

            if (isset($data['factionSymbol'])) {
                $prompt .= ' ' . $data['factionSymbol'];
            }

            return $prompt;
        }

        return null;
    }
}
