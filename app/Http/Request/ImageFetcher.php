<?php

namespace App\Http\Request;

use App\Exceptions\InvalidRequestException;

class ImageFetcher
{
    private DallERequest $httpRequest;

    public function __construct(DallERequest $httpRequest)
    {
        $this->httpRequest = $httpRequest;
    }

    /**
     * @throws InvalidRequestException
     */
    public function fetchImage(string $prompt, int $size): string
    {
        // If Dall-E is disabled, return placeholder image for requests
        if (config('dalle.disabled')) {
            return sprintf('https://placehold.co/%dx%d/png', $size, $size);
        }

        $responseJSON = $this->httpRequest->post('generations', [
            'prompt' => $prompt,
            'n' => 1,
            'size' => sprintf('%dx%d', $size, $size)
        ]);

        if (!isset($responseJSON['data'][0]['url'])) {
            throw new InvalidRequestException('Dall-E image not created');
        }

        return $responseJSON['data'][0]['url'];
    }
}
