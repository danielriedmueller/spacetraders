<?php

namespace App\Storage;

use App\Exceptions\InvalidRequestException;
use App\Http\Request\ImageFetcher;
use Illuminate\Support\Facades\Storage;

class ImageStorage
{
    private ImageFetcher $imageFetcher;

    public function __construct(ImageFetcher $imageFetcher)
    {
        $this->imageFetcher = $imageFetcher;
    }

    private function store($contents, $filename): void
    {
        Storage::disk('public')->put($filename, $contents);
    }

    /**
     * @throws InvalidRequestException
     */
    public function getOrCreateImage(string $filename, string $prompt, int $size = 256): string
    {
        if (!Storage::disk('public')->exists($filename)) {
            $imageUrl = $this->imageFetcher->fetchImage($prompt, $size);
            $this->store(file_get_contents($imageUrl), $filename);
        }

        return Storage::disk('public')->url($filename);
    }

    public function getImage(string $filename): ?string
    {
        if (Storage::disk('public')->exists($filename)) {
            return Storage::disk('public')->url($filename);
        }

        return null;
    }
}
