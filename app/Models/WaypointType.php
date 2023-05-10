<?php
/**
 * WaypointType
 */
namespace App\Models;

/**
 * WaypointType
 * @description The type of waypoint.
 */
class WaypointType
{
    /**
     * Possible values of this enum
     */
    const PLANET = 'PLANET';

    const GAS_GIANT = 'GAS_GIANT';

    const MOON = 'MOON';

    const ORBITAL_STATION = 'ORBITAL_STATION';

    const JUMP_GATE = 'JUMP_GATE';

    const ASTEROID_FIELD = 'ASTEROID_FIELD';

    const NEBULA = 'NEBULA';

    const DEBRIS_FIELD = 'DEBRIS_FIELD';

    const GRAVITY_WELL = 'GRAVITY_WELL';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::PLANET,
            self::GAS_GIANT,
            self::MOON,
            self::ORBITAL_STATION,
            self::JUMP_GATE,
            self::ASTEROID_FIELD,
            self::NEBULA,
            self::DEBRIS_FIELD,
            self::GRAVITY_WELL
        ];
    }
}
