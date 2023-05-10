<?php
/**
 * ShipRole
 */
namespace App\Models;

/**
 * ShipRole
 * @description The registered role of the ship
 */
class ShipRole
{
    /**
     * Possible values of this enum
     */
    const FABRICATOR = 'FABRICATOR';

    const HARVESTER = 'HARVESTER';

    const HAULER = 'HAULER';

    const INTERCEPTOR = 'INTERCEPTOR';

    const EXCAVATOR = 'EXCAVATOR';

    const TRANSPORT = 'TRANSPORT';

    const REPAIR = 'REPAIR';

    const SURVEYOR = 'SURVEYOR';

    const COMMAND = 'COMMAND';

    const CARRIER = 'CARRIER';

    const PATROL = 'PATROL';

    const SATELLITE = 'SATELLITE';

    const EXPLORER = 'EXPLORER';

    const REFINERY = 'REFINERY';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::FABRICATOR,
            self::HARVESTER,
            self::HAULER,
            self::INTERCEPTOR,
            self::EXCAVATOR,
            self::TRANSPORT,
            self::REPAIR,
            self::SURVEYOR,
            self::COMMAND,
            self::CARRIER,
            self::PATROL,
            self::SATELLITE,
            self::EXPLORER,
            self::REFINERY
        ];
    }
}
