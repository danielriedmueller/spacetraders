<?php
/**
 * SystemType
 */
namespace App\Models;

/**
 * SystemType
 * @description The type of waypoint.
 */
class SystemType
{
    /**
     * Possible values of this enum
     */
    const NEUTRON_STAR = 'NEUTRON_STAR';

    const RED_STAR = 'RED_STAR';

    const ORANGE_STAR = 'ORANGE_STAR';

    const BLUE_STAR = 'BLUE_STAR';

    const YOUNG_STAR = 'YOUNG_STAR';

    const WHITE_DWARF = 'WHITE_DWARF';

    const BLACK_HOLE = 'BLACK_HOLE';

    const HYPERGIANT = 'HYPERGIANT';

    const NEBULA = 'NEBULA';

    const UNSTABLE = 'UNSTABLE';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::NEUTRON_STAR,
            self::RED_STAR,
            self::ORANGE_STAR,
            self::BLUE_STAR,
            self::YOUNG_STAR,
            self::WHITE_DWARF,
            self::BLACK_HOLE,
            self::HYPERGIANT,
            self::NEBULA,
            self::UNSTABLE
        ];
    }
}
