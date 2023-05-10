<?php
/**
 * ShipNavFlightMode
 */
namespace App\Models;

/**
 * ShipNavFlightMode
 * @description The ship's set speed when traveling between waypoints or systems.
 */
class ShipNavFlightMode
{
    /**
     * Possible values of this enum
     */
    const DRIFT = 'DRIFT';

    const STEALTH = 'STEALTH';

    const CRUISE = 'CRUISE';

    const BURN = 'BURN';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::DRIFT,
            self::STEALTH,
            self::CRUISE,
            self::BURN
        ];
    }
}
