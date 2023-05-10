<?php
/**
 * TradeSymbol
 */
namespace App\Models;

/**
 * TradeSymbol
 */
class TradeSymbol
{
    /**
     * Possible values of this enum
     */
    const PRECIOUS_STONES = 'PRECIOUS_STONES';

    const QUARTZ_SAND = 'QUARTZ_SAND';

    const SILICON_CRYSTALS = 'SILICON_CRYSTALS';

    const AMMONIA_ICE = 'AMMONIA_ICE';

    const LIQUID_HYDROGEN = 'LIQUID_HYDROGEN';

    const LIQUID_NITROGEN = 'LIQUID_NITROGEN';

    const ICE_WATER = 'ICE_WATER';

    const EXOTIC_MATTER = 'EXOTIC_MATTER';

    const ADVANCED_CIRCUITRY = 'ADVANCED_CIRCUITRY';

    const GRAVITON_EMITTERS = 'GRAVITON_EMITTERS';

    const IRON = 'IRON';

    const IRON_ORE = 'IRON_ORE';

    const COPPER = 'COPPER';

    const COPPER_ORE = 'COPPER_ORE';

    const ALUMINUM = 'ALUMINUM';

    const ALUMINUM_ORE = 'ALUMINUM_ORE';

    const SILVER = 'SILVER';

    const SILVER_ORE = 'SILVER_ORE';

    const GOLD = 'GOLD';

    const GOLD_ORE = 'GOLD_ORE';

    const PLATINUM = 'PLATINUM';

    const PLATINUM_ORE = 'PLATINUM_ORE';

    const DIAMONDS = 'DIAMONDS';

    const URANITE = 'URANITE';

    const URANITE_ORE = 'URANITE_ORE';

    const MERITIUM = 'MERITIUM';

    const MERITIUM_ORE = 'MERITIUM_ORE';

    const HYDROCARBON = 'HYDROCARBON';

    const ANTIMATTER = 'ANTIMATTER';

    const FERTILIZERS = 'FERTILIZERS';

    const FABRICS = 'FABRICS';

    const FOOD = 'FOOD';

    const JEWELRY = 'JEWELRY';

    const MACHINERY = 'MACHINERY';

    const FIREARMS = 'FIREARMS';

    const ASSAULT_RIFLES = 'ASSAULT_RIFLES';

    const MILITARY_EQUIPMENT = 'MILITARY_EQUIPMENT';

    const EXPLOSIVES = 'EXPLOSIVES';

    const LAB_INSTRUMENTS = 'LAB_INSTRUMENTS';

    const AMMUNITION = 'AMMUNITION';

    const ELECTRONICS = 'ELECTRONICS';

    const SHIP_PLATING = 'SHIP_PLATING';

    const EQUIPMENT = 'EQUIPMENT';

    const FUEL = 'FUEL';

    const MEDICINE = 'MEDICINE';

    const DRUGS = 'DRUGS';

    const CLOTHING = 'CLOTHING';

    const MICROPROCESSORS = 'MICROPROCESSORS';

    const PLASTICS = 'PLASTICS';

    const POLYNUCLEOTIDES = 'POLYNUCLEOTIDES';

    const BIOCOMPOSITES = 'BIOCOMPOSITES';

    const NANOBOTS = 'NANOBOTS';

    const AI_MAINFRAMES = 'AI_MAINFRAMES';

    const QUANTUM_DRIVES = 'QUANTUM_DRIVES';

    const ROBOTIC_DRONES = 'ROBOTIC_DRONES';

    const CYBER_IMPLANTS = 'CYBER_IMPLANTS';

    const GENE_THERAPEUTICS = 'GENE_THERAPEUTICS';

    const NEURAL_CHIPS = 'NEURAL_CHIPS';

    const MOOD_REGULATORS = 'MOOD_REGULATORS';

    const VIRAL_AGENTS = 'VIRAL_AGENTS';

    const MICRO_FUSION_GENERATORS = 'MICRO_FUSION_GENERATORS';

    const SUPERGRAINS = 'SUPERGRAINS';

    const LASER_RIFLES = 'LASER_RIFLES';

    const HOLOGRAPHICS = 'HOLOGRAPHICS';

    const SHIP_SALVAGE = 'SHIP_SALVAGE';

    const RELIC_TECH = 'RELIC_TECH';

    const NOVEL_LIFEFORMS = 'NOVEL_LIFEFORMS';

    const BOTANICAL_SPECIMENS = 'BOTANICAL_SPECIMENS';

    const CULTURAL_ARTIFACTS = 'CULTURAL_ARTIFACTS';

    const REACTOR_SOLAR_I = 'REACTOR_SOLAR_I';

    const REACTOR_FUSION_I = 'REACTOR_FUSION_I';

    const REACTOR_FISSION_I = 'REACTOR_FISSION_I';

    const REACTOR_CHEMICAL_I = 'REACTOR_CHEMICAL_I';

    const REACTOR_ANTIMATTER_I = 'REACTOR_ANTIMATTER_I';

    const ENGINE_IMPULSE_DRIVE_I = 'ENGINE_IMPULSE_DRIVE_I';

    const ENGINE_ION_DRIVE_I = 'ENGINE_ION_DRIVE_I';

    const ENGINE_ION_DRIVE_II = 'ENGINE_ION_DRIVE_II';

    const ENGINE_HYPER_DRIVE_I = 'ENGINE_HYPER_DRIVE_I';

    const MODULE_MINERAL_PROCESSOR_I = 'MODULE_MINERAL_PROCESSOR_I';

    const MODULE_CARGO_HOLD_I = 'MODULE_CARGO_HOLD_I';

    const MODULE_CREW_QUARTERS_I = 'MODULE_CREW_QUARTERS_I';

    const MODULE_ENVOY_QUARTERS_I = 'MODULE_ENVOY_QUARTERS_I';

    const MODULE_PASSENGER_CABIN_I = 'MODULE_PASSENGER_CABIN_I';

    const MODULE_MICRO_REFINERY_I = 'MODULE_MICRO_REFINERY_I';

    const MODULE_ORE_REFINERY_I = 'MODULE_ORE_REFINERY_I';

    const MODULE_FUEL_REFINERY_I = 'MODULE_FUEL_REFINERY_I';

    const MODULE_SCIENCE_LAB_I = 'MODULE_SCIENCE_LAB_I';

    const MODULE_JUMP_DRIVE_I = 'MODULE_JUMP_DRIVE_I';

    const MODULE_JUMP_DRIVE_II = 'MODULE_JUMP_DRIVE_II';

    const MODULE_JUMP_DRIVE_III = 'MODULE_JUMP_DRIVE_III';

    const MODULE_WARP_DRIVE_I = 'MODULE_WARP_DRIVE_I';

    const MODULE_WARP_DRIVE_II = 'MODULE_WARP_DRIVE_II';

    const MODULE_WARP_DRIVE_III = 'MODULE_WARP_DRIVE_III';

    const MODULE_SHIELD_GENERATOR_I = 'MODULE_SHIELD_GENERATOR_I';

    const MODULE_SHIELD_GENERATOR_II = 'MODULE_SHIELD_GENERATOR_II';

    const MOUNT_GAS_SIPHON_I = 'MOUNT_GAS_SIPHON_I';

    const MOUNT_GAS_SIPHON_II = 'MOUNT_GAS_SIPHON_II';

    const MOUNT_GAS_SIPHON_III = 'MOUNT_GAS_SIPHON_III';

    const MOUNT_SURVEYOR_I = 'MOUNT_SURVEYOR_I';

    const MOUNT_SURVEYOR_II = 'MOUNT_SURVEYOR_II';

    const MOUNT_SURVEYOR_III = 'MOUNT_SURVEYOR_III';

    const MOUNT_SENSOR_ARRAY_I = 'MOUNT_SENSOR_ARRAY_I';

    const MOUNT_SENSOR_ARRAY_II = 'MOUNT_SENSOR_ARRAY_II';

    const MOUNT_SENSOR_ARRAY_III = 'MOUNT_SENSOR_ARRAY_III';

    const MOUNT_MINING_LASER_I = 'MOUNT_MINING_LASER_I';

    const MOUNT_MINING_LASER_II = 'MOUNT_MINING_LASER_II';

    const MOUNT_MINING_LASER_III = 'MOUNT_MINING_LASER_III';

    const MOUNT_LASER_CANNON_I = 'MOUNT_LASER_CANNON_I';

    const MOUNT_MISSILE_LAUNCHER_I = 'MOUNT_MISSILE_LAUNCHER_I';

    const MOUNT_TURRET_I = 'MOUNT_TURRET_I';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::PRECIOUS_STONES,
            self::QUARTZ_SAND,
            self::SILICON_CRYSTALS,
            self::AMMONIA_ICE,
            self::LIQUID_HYDROGEN,
            self::LIQUID_NITROGEN,
            self::ICE_WATER,
            self::EXOTIC_MATTER,
            self::ADVANCED_CIRCUITRY,
            self::GRAVITON_EMITTERS,
            self::IRON,
            self::IRON_ORE,
            self::COPPER,
            self::COPPER_ORE,
            self::ALUMINUM,
            self::ALUMINUM_ORE,
            self::SILVER,
            self::SILVER_ORE,
            self::GOLD,
            self::GOLD_ORE,
            self::PLATINUM,
            self::PLATINUM_ORE,
            self::DIAMONDS,
            self::URANITE,
            self::URANITE_ORE,
            self::MERITIUM,
            self::MERITIUM_ORE,
            self::HYDROCARBON,
            self::ANTIMATTER,
            self::FERTILIZERS,
            self::FABRICS,
            self::FOOD,
            self::JEWELRY,
            self::MACHINERY,
            self::FIREARMS,
            self::ASSAULT_RIFLES,
            self::MILITARY_EQUIPMENT,
            self::EXPLOSIVES,
            self::LAB_INSTRUMENTS,
            self::AMMUNITION,
            self::ELECTRONICS,
            self::SHIP_PLATING,
            self::EQUIPMENT,
            self::FUEL,
            self::MEDICINE,
            self::DRUGS,
            self::CLOTHING,
            self::MICROPROCESSORS,
            self::PLASTICS,
            self::POLYNUCLEOTIDES,
            self::BIOCOMPOSITES,
            self::NANOBOTS,
            self::AI_MAINFRAMES,
            self::QUANTUM_DRIVES,
            self::ROBOTIC_DRONES,
            self::CYBER_IMPLANTS,
            self::GENE_THERAPEUTICS,
            self::NEURAL_CHIPS,
            self::MOOD_REGULATORS,
            self::VIRAL_AGENTS,
            self::MICRO_FUSION_GENERATORS,
            self::SUPERGRAINS,
            self::LASER_RIFLES,
            self::HOLOGRAPHICS,
            self::SHIP_SALVAGE,
            self::RELIC_TECH,
            self::NOVEL_LIFEFORMS,
            self::BOTANICAL_SPECIMENS,
            self::CULTURAL_ARTIFACTS,
            self::REACTOR_SOLAR_I,
            self::REACTOR_FUSION_I,
            self::REACTOR_FISSION_I,
            self::REACTOR_CHEMICAL_I,
            self::REACTOR_ANTIMATTER_I,
            self::ENGINE_IMPULSE_DRIVE_I,
            self::ENGINE_ION_DRIVE_I,
            self::ENGINE_ION_DRIVE_II,
            self::ENGINE_HYPER_DRIVE_I,
            self::MODULE_MINERAL_PROCESSOR_I,
            self::MODULE_CARGO_HOLD_I,
            self::MODULE_CREW_QUARTERS_I,
            self::MODULE_ENVOY_QUARTERS_I,
            self::MODULE_PASSENGER_CABIN_I,
            self::MODULE_MICRO_REFINERY_I,
            self::MODULE_ORE_REFINERY_I,
            self::MODULE_FUEL_REFINERY_I,
            self::MODULE_SCIENCE_LAB_I,
            self::MODULE_JUMP_DRIVE_I,
            self::MODULE_JUMP_DRIVE_II,
            self::MODULE_JUMP_DRIVE_III,
            self::MODULE_WARP_DRIVE_I,
            self::MODULE_WARP_DRIVE_II,
            self::MODULE_WARP_DRIVE_III,
            self::MODULE_SHIELD_GENERATOR_I,
            self::MODULE_SHIELD_GENERATOR_II,
            self::MOUNT_GAS_SIPHON_I,
            self::MOUNT_GAS_SIPHON_II,
            self::MOUNT_GAS_SIPHON_III,
            self::MOUNT_SURVEYOR_I,
            self::MOUNT_SURVEYOR_II,
            self::MOUNT_SURVEYOR_III,
            self::MOUNT_SENSOR_ARRAY_I,
            self::MOUNT_SENSOR_ARRAY_II,
            self::MOUNT_SENSOR_ARRAY_III,
            self::MOUNT_MINING_LASER_I,
            self::MOUNT_MINING_LASER_II,
            self::MOUNT_MINING_LASER_III,
            self::MOUNT_LASER_CANNON_I,
            self::MOUNT_MISSILE_LAUNCHER_I,
            self::MOUNT_TURRET_I
        ];
    }
}
