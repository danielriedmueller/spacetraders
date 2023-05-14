<?php

namespace App\Models;

class ImageModel extends EntityModel
{
    /** @var string $image */
    public $image = "";
    public $imagePrompt = "";

    public function getImageName(): string
    {
        return '';
    }

    public function getImagePrompt(): string
    {
        return '';
    }
}
