<?php
/**
 * Waypoint
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * Waypoint
 * @description A waypoint is a location that ships can travel to such as a Planet, Moon or Space Station.
 */
class Waypoint extends ImageModel
{
    /** @var string $symbol */
    public $symbol = "";

    /** @var string $type */
    public $type = "";

    /** @var string $systemSymbol */
    public $systemSymbol = "";

    /** @var int $x */
    public $x = 0;

    /** @var int $y */
    public $y = 0;

    /** @var \App\Models\WaypointOrbital[] $orbitals */
    public $orbitals = [];

    /** @var \App\Models\WaypointFaction $faction */
    public $faction;

    /** @var \App\Models\WaypointTrait[] $traits The traits of the waypoint. */
    //public $traits = [];

    /** @var \App\Models\Chart $chart */
    public $chart;

    protected function traits(): Attribute
    {
        return Attribute::make(
            get: fn (array $value) => array_map(function (array $trait) {
                $waypointTrait = new WaypointTrait();
                $waypointTrait->symbol = $trait['symbol'];
                $waypointTrait->name = $trait['name'];
                $waypointTrait->description = $trait['description'];
                return $waypointTrait;
            }, $value),
            set: function (string $value) {
              return strtolower($value);
            }
        );
    }

    public function getImageName(): string
    {
        return 'waypoint/waypoint-' . str_replace(' ', '-', strtolower($this->symbol)) . '.png';
    }

    public function getImagePrompt(): string
    {
        $prompt = $this->type;
        $prompt .= ' ' . implode(' ', array_map(fn($trait) => $trait->name, $this->traits));
        $prompt .= ' ' . $this->faction->symbol;

        return $prompt;
    }
}
