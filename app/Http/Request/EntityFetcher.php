<?php

namespace App\Http\Request;

use App\Exceptions\InvalidRequestException;
use App\Factories\EntityFactory;
use App\Factories\WaypointFactory;
use App\Models\Agent;
use PhpParser\Node\Expr\Cast\Object_;

class EntityFetcher
{
    private SpaceTraderRequest $httpRequest;
    private EntityFactory $entityFactory;

    public function __construct(SpaceTraderRequest $httpRequest, EntityFactory $entityFactory)
    {
        $this->httpRequest = $httpRequest;
        $this->entityFactory = $entityFactory;
    }

    /**
     * @throws InvalidRequestException
     */
    public function fetchEntity(string $url, string $className): Object
    {
        return $this->entityFactory->createEntity($className, $this->httpRequest->get($url)['data']);
    }

    /**
     * @throws InvalidRequestException
     */
    public function fetchEntities(string $url, string $className): array
    {
        return array_map(function ($entity) use ($className) {
            return $this->entityFactory->createEntity($className, $entity);
        }, $this->httpRequest->get($url)['data']);
    }
}
