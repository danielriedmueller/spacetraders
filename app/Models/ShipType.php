<?php
/**
 * ShipType
 */
namespace App\Models;

/**
 * ShipType
 * @description
 */
class ShipType
{
    /**
     * Possible values of this enum
     */
    const PROBE = 'SHIP_PROBE';

    const MINING_DRONE = 'SHIP_MINING_DRONE';

    const INTERCEPTOR = 'SHIP_INTERCEPTOR';

    const LIGHT_HAULER = 'SHIP_LIGHT_HAULER';

    const COMMAND_FRIGATE = 'SHIP_COMMAND_FRIGATE';

    const EXPLORER = 'SHIP_EXPLORER';

    const HEAVY_FREIGHTER = 'SHIP_HEAVY_FREIGHTER';

    const LIGHT_SHUTTLE = 'SHIP_LIGHT_SHUTTLE';

    const ORE_HOUND = 'SHIP_ORE_HOUND';

    const REFINING_FREIGHTER = 'SHIP_REFINING_FREIGHTER';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::PROBE,
            self::MINING_DRONE,
            self::INTERCEPTOR,
            self::LIGHT_HAULER,
            self::COMMAND_FRIGATE,
            self::EXPLORER,
            self::HEAVY_FREIGHTER,
            self::LIGHT_SHUTTLE,
            self::ORE_HOUND,
            self::REFINING_FREIGHTER
        ];
    }
}
