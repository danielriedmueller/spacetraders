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
}
