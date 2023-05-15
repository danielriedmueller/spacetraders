<?php

namespace App\Factories;

use App\Exceptions\InvalidRequestException;
use App\Models\ImageModel;
use App\Models\Waypoint;
use App\Storage\ImageStorage;

class EntityFactory
{
    private ImageStorage $imageStorage;

    public function __construct(ImageStorage $imageStorage)
    {
        $this->imageStorage = $imageStorage;
    }

    /**
     * @throws InvalidRequestException
     */
    public function createEntity(string $className, array $data): object
    {
        $entity = new $className();
        foreach ($data as $key => $value) {
            if (property_exists($entity, $key) || method_exists($entity, $key)) {
                $entity->$key = $value;
            }
        }

        if (is_a($entity, ImageModel::class)) {
            $imageConfig = $entity->getImageConfig();
            $imageName = $imageConfig['name'];
            $imagePath = $this->imageStorage->getImage($imageName);
            $imagePrompt = $imageConfig['prompt'];
            $imageSize = $imageConfig['size'];
            if (!$imagePath) {
                if ($promptData = $imagePrompt) {
                    $imagePath = $this->imageStorage->getOrCreateImage($imageName, $promptData, $imageSize);
                }
            }
            $entity->image = $imagePath;
            $entity->imagePrompt = $imagePrompt;
        }

        return $entity;
    }
}
