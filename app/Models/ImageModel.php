<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageModel extends EntityModel
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

    public function toArray(): array
    {
        return array_merge(
            array_diff_key(get_object_vars($this), get_class_vars(Model::class)),
            $this->attributesToArray(),
            $this->relationsToArray()
        );
    }
}
