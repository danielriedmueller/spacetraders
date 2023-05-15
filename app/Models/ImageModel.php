<?php

namespace App\Models;

class ImageModel extends EntityModel
{
    /** @var string $image */
    public $image = "";
    public $imagePrompt = "";

    public function getImageConfig(): array
    {
        return [
            'name' => '',
            'prompt' => '',
            'size' => 0,
        ];
    }
}
