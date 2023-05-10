<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntityModel extends Model
{
    protected function valueTransfomer(mixed $data, string $className): Object
    {
        $entity = new $className();
        foreach ($data as $key => $value) {
            if (property_exists($entity, $key) || method_exists($entity, $key)) {
                $entity->$key = $value;
            }
        }

        return $entity;
    }
}
