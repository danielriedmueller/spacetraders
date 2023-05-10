<?php
/**
 * Faction
 */
namespace App\Models;

/**
 * Faction
 * @description
 */
class Faction extends ImageModel {

    /** @var string $symbol */
    public $symbol = "";

    /** @var string $name */
    public $name = "";

    /** @var string $description */
    public $description = "";

    /** @var string $headquarters */
    public $headquarters = "";

    /** @var \App\Models\FactionTrait[] $traits */
    public $traits = [];

    public function getImageName(): string
    {
        return 'faction/faction-' . str_replace(' ', '-', strtolower($this->name)) . '.png';
    }

    public function getImagePrompt(): string
    {
        return 'Faction ' . implode(' ', array_map(fn($trait) => $trait->name, $this->traits));
    }
}
