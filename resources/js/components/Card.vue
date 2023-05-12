<template>
    <div v-if="entity.symbol" class="col-sm-12 col-md-6 col-xl-3">
        <div class="p-3 border bg-light">
            <div class="card">
                <div class="card-body">
                    <img v-if="entity.image" class="card-img-top" :src="entity.image" alt="Card image not found">
                    <h5 class="card-title">{{ entity.symbol }}</h5>
                    <dl>
                        <!-- Name -->
                        <template v-if="entity.name">
                            <dt>Name</dt>
                            <dd>{{ entity.name }}</dd>
                        </template>
                        <!-- Description -->
                        <template v-if="entity.description">
                            <dt>Description</dt>
                            <dd>{{ entity.description }}</dd>
                        </template>
                        <!-- Credits -->
                        <template v-if="entity.credits">
                            <dt>Credits</dt>
                            <dd>{{ entity.credits }}</dd>
                        </template>
                        <!-- Headquarters -->
                        <template v-if="entity.headquarters">
                            <dt>Headquarters</dt>
                            <dd><a href="#" @click="get('waypoint', entity.headquarters)"
                                   class="btn btn-secondary">{{ entity.headquarters }}</a></dd>
                        </template>
                        <!-- Faction -->
                        <template v-if="entity.faction && entity.faction.symbol">
                            <dt>Faction</dt>
                            <dd><a href="#" @click="get('faction', entity.faction.symbol)"
                                   class="btn btn-secondary">{{ entity.faction.symbol }}</a></dd>
                        </template>
                        <!-- Factions -->
                        <template v-if="entity.factions && entity.factions.length > 0">
                            <dt>Factions</dt>
                            <dd v-for="faction in entity.factions">
                                <a href="#" @click="get('faction', faction.symbol)"
                                   class="btn btn-secondary">{{ faction.symbol }}</a>
                            </dd>
                        </template>
                        <!-- System -->
                        <template v-if="entity.systemSymbol">
                            <dt>System</dt>
                            <dd><a href="#" @click="get('system', entity.systemSymbol)"
                                   class="btn btn-secondary">{{ entity.systemSymbol }}</a></dd>
                        </template>
                        <!-- Sector -->
                        <template v-if="entity.sectorSymbol">
                            <dt>Sector</dt>
                            <dd>{{ entity.sectorSymbol }}</dd>
                        </template>
                        <!-- Type -->
                        <template v-if="entity.type">
                            <dt>Type</dt>
                            <dd>{{ entity.type }}</dd>
                        </template>
                        <!-- Waypoints -->
                        <template v-if="entity.waypoints && entity.waypoints.length > 0">
                            <dt>Waypoints</dt>
                            <dd v-for="waypoint in entity.waypoints">
                                <b>{{ waypoint.type }}</b>: <a href="#"
                                                               @click="get('waypoint', waypoint.symbol)"
                                                               class="btn btn-secondary">{{ waypoint.symbol }}</a>
                            </dd>
                        </template>
                        <!-- Orbitals -->
                        <template v-if="entity.orbitals && entity.orbitals.length > 0">
                            <dt>Orbitals</dt>
                            <dd v-for="orbital in entity.orbitals">
                                <a href="#" @click="get('waypoint', orbital.symbol)"
                                   class="btn btn-secondary">{{ orbital.symbol }}</a>
                            </dd>
                        </template>
                        <!-- Traits -->
                        <template v-if="entity.traits && entity.traits.length > 0">
                            <dt>Traits</dt>
                            <dd v-for="trait in entity.traits">
                                <b>{{ trait.name }}</b>: {{ trait.description }}
                            </dd>
                        </template>
                        <!-- Ships -->
                        <template v-if="entity.ships && entity.ships.length > 0">
                            <dt>Ships</dt>
                            <dd v-for="ship in entity.ships">
                                <a href="#" @click="get('ship', ship.symbol, 'my/ships')"
                                   class="btn btn-secondary">{{ ship.symbol }}</a>
                            </dd>
                        </template>
                        <!-- ShipRegistration -->
                        <template v-if="entity.registration">
                            <dt>Name</dt>
                            <dd>{{ entity.registration.name }}</dd>
                            <dt>Faction</dt>
                            <dd><a href="#" @click="get('faction', entity.registration.factionSymbol)"
                                   class="btn btn-secondary">{{ entity.registration.factionSymbol }}</a></dd>
                            <dt>Role</dt>
                            <dd>{{ entity.registration.role }}</dd>
                        </template>
                        <!-- ShipNavigation -->
                        <template v-if="entity.nav">
                            <dt>Current Location</dt>
                            <dd><a href="#"
                                   @click="get('waypoint', entity.nav.waypointSymbol)"
                                   class="btn btn-secondary">{{ entity.nav.waypointSymbol }}</a></dd>
                            <dt>Status</dt>
                            <dd>{{ entity.nav.status }}</dd>
                            <dt>Flight mode</dt>
                            <dd>{{ entity.nav.flightMode }}</dd>
                        </template>
                        <!-- Crew -->
                        <template v-if="entity.crew">
                            <dt>Current</dt>
                            <dd>{{ entity.crew.current }}</dd>
                            <dt>Required</dt>
                            <dd>{{ entity.crew.required }}</dd>
                            <dt>Capacity</dt>
                            <dd>{{ entity.crew.capacity }}</dd>
                            <dt>Rotation</dt>
                            <dd>{{ entity.crew.rotation }}</dd>
                            <dt>Morale</dt>
                            <dd>{{ entity.crew.morale }}</dd>
                            <dt>Wages</dt>
                            <dd>{{ entity.crew.wages }}</dd>
                        </template>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['entity'],
    emits: ['updateEntity'],
    methods: {
        get: function (type, symbol, endpoint = null) {
            this.$emit('updateEntity', type, symbol, endpoint);
        }
    },
}
</script>
