<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntityModel extends Model
{
    public string $updatedAt = '';

    public function __construct()
    {
        $updatedAt = date('Y-m-d H:i:s');
        $this->updatedAt = $updatedAt;

        parent::__construct();
    }


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

    public function toArray(): array
    {
        return array_merge(
            array_diff_key(get_object_vars($this), get_class_vars(Model::class)),
            $this->attributesToArray(),
            $this->relationsToArray()
        );
    }
}
