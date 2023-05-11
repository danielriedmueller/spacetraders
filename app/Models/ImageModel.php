<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model
{
    /** @var string $image */
    public $image = "";

    public function getImageName(): string
    {
        return '';
    }

    public function getImagePrompt(): string
    {
        return '';
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
