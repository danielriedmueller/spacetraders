<?php
/**
 * Faction
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

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

    protected function traits(): Attribute
    {
        return Attribute::make(
            get: fn(array $value) => array_map(fn ($value) => $this->valueTransfomer($value, FactionTrait::class), $value),
        );
    }

    public function getImageConfig(): array
    {
        return [
            'name' => 'faction/faction-' . str_replace(' ', '-', strtolower($this->name)) . '.png',
            'prompt' => 'Faction ' . implode(' ', array_map(fn($trait) => $trait->name, $this->traits))
        ];
    }
}
