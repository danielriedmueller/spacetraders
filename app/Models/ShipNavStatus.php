<?php
/**
 * ShipNavStatus
 */
namespace App\Models;

/**
 * ShipNavStatus
 * @description The current status of the ship
 */
class ShipNavStatus
{
    /**
     * Possible values of this enum
     */
    const IN_TRANSIT = 'IN_TRANSIT';

    const IN_ORBIT = 'IN_ORBIT';

    const DOCKED = 'DOCKED';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::IN_TRANSIT,
            self::IN_ORBIT,
            self::DOCKED
        ];
    }
}
