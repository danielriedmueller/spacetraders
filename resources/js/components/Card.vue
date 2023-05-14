<template>
    <div v-if="entity.symbol" class="col-sm-12 col-md-6 col-xl-3">
        <div class="card">
            <h5 class="card-header text-center">{{ type.toUpperCase() }}</h5>
            <img v-if="entity.image" :src="entity.image" alt="Card image not found">
            <div class="card-body">
                <h5 class="card-title">{{ entity.symbol }}</h5>
            </div>
            <ul class="list-group list-group-flush">
                <!-- Name -->
                <template v-if="entity.name">
                    <li class="list-group-item">
                        <dl>
                            <dt>Name</dt>
                            <dd>{{ entity.name }}</dd>
                        </dl>
                    </li>
                </template>

                <!-- Description -->
                <template v-if="entity.description">
                    <li class="list-group-item">
                        <dl>
                            <dt>Description</dt>
                            <dd>{{ entity.description }}</dd>
                        </dl>
                    </li>
                </template>

                <!-- Credits -->
                <template v-if="entity.credits">
                    <li class="list-group-item">
                        <dl>
                            <dt>Credits</dt>
                            <dd>{{ entity.credits }}</dd>
                        </dl>
                    </li>
                </template>

                <!-- Headquarters -->
                <template v-if="entity.headquarters">
                    <li class="list-group-item">
                        <dl>
                            <dt>Headquarters</dt>
                            <dd><a href="#" @click.prevent="get('waypoint', entity.headquarters)"
                                   class="btn btn-secondary">{{ entity.headquarters }}</a></dd>
                        </dl>
                    </li>
                </template>

                <!-- Faction -->
                <template v-if="entity.faction && entity.faction.symbol">
                    <li class="list-group-item">
                        <dl>
                            <dt>Faction</dt>
                            <dd><a href="#" @click.prevent="get('faction', entity.faction.symbol)"
                                   class="btn btn-secondary">{{ entity.faction.symbol }}</a></dd>
                        </dl>
                    </li>
                </template>

                <!-- Factions -->
                <template v-if="entity.factions && entity.factions.length > 0">
                    <li class="list-group-item">
                        <dl>
                            <dt>Factions</dt>
                            <dd v-for="faction in entity.factions">
                                <a href="#" @click.prevent="get('faction', faction.symbol)"
                                   class="btn btn-secondary">{{ faction.symbol }}</a>
                            </dd>
                        </dl>
                    </li>
                </template>

                <!-- System -->
                <template v-if="entity.systemSymbol">
                    <li class="list-group-item">
                        <dl>
                            <dt>System</dt>
                            <dd><a href="#" @click.prevent="get('system', entity.systemSymbol)"
                                   class="btn btn-secondary">{{ entity.systemSymbol }}</a></dd>
                        </dl>
                    </li>
                </template>

                <!-- Sector -->
                <template v-if="entity.sectorSymbol">
                    <li class="list-group-item">
                        <dl>
                            <dt>Sector</dt>
                            <dd>{{ entity.sectorSymbol }}</dd>
                        </dl>
                    </li>
                </template>

                <!-- Type -->
                <template v-if="entity.type">
                    <li class="list-group-item">
                        <dl>
                            <dt>Type</dt>
                            <dd>{{ entity.type }}</dd>
                        </dl>
                    </li>
                </template>

                <!-- Waypoints -->
                <template v-if="entity.waypoints && entity.waypoints.length > 0">
                    <li class="list-group-item">
                        <dl>
                            <dt>Waypoints</dt>
                            <dd v-for="waypoint in entity.waypoints">
                                <b>{{ waypoint.type }}</b>: <a href="#"
                                                               @click.prevent="get('waypoint', waypoint.symbol)"
                                                               class="btn btn-secondary">{{ waypoint.symbol }}</a>
                            </dd>
                        </dl>
                    </li>
                </template>

                <!-- Orbitals -->
                <template v-if="entity.orbitals && entity.orbitals.length > 0">
                    <li class="list-group-item">
                        <dl>
                            <dt>Orbitals</dt>
                            <dd v-for="orbital in entity.orbitals">
                                <a href="#" @click.prevent="get('waypoint', orbital.symbol)"
                                   class="btn btn-secondary">{{ orbital.symbol }}</a>
                            </dd>
                        </dl>
                    </li>
                </template>

                <!-- Traits -->
                <template v-if="entity.traits && entity.traits.length > 0">
                    <li class="list-group-item">
                        <dl>
                            <dt>Traits</dt>
                            <dd v-for="trait in entity.traits">
                                <b>{{ trait.name }}</b>: {{ trait.description }}
                            </dd>
                        </dl>
                    </li>
                </template>

                <!-- Ships -->
                <template v-if="entity.ships && entity.ships.length > 0">
                    <li class="list-group-item">
                        <dl>
                            <dt>Ships</dt>
                            <dd v-for="ship in entity.ships">
                                <a href="#" @click.prevent="get('ship', ship.symbol, 'my/ships')"
                                   class="btn btn-secondary">{{ ship.symbol }}</a>
                            </dd>
                        </dl>
                    </li>
                </template>

                <!-- ShipRegistration -->
                <template v-if="entity.registration">
                    <li class="list-group-item">
                        <dl>
                            <dt>Name</dt>
                            <dd>{{ entity.registration.name }}</dd>
                            <dt>Faction</dt>
                            <dd><a href="#" @click.prevent="get('faction', entity.registration.factionSymbol)"
                                   class="btn btn-secondary">{{ entity.registration.factionSymbol }}</a></dd>
                            <dt>Role</dt>
                            <dd>{{ entity.registration.role }}</dd>
                        </dl>
                    </li>
                </template>

                <!-- ShipNavigation -->
                <template v-if="entity.nav">
                    <dt>Current Location</dt>
                    <li class="list-group-item">
                        <dl>
                            <dd><a href="#"
                                   @click.prevent="get('waypoint', entity.nav.waypointSymbol)"
                                   class="btn btn-secondary">{{ entity.nav.waypointSymbol }}</a></dd>
                            <dt>Status</dt>
                            <dd>{{ entity.nav.status }}</dd>
                            <dt>Flight mode</dt>
                            <dd>{{ entity.nav.flightMode }}</dd>
                        </dl>
                    </li>
                </template>

                <!-- Crew -->
                <template v-if="entity.crew">
                    <li class="list-group-item">
                        <dl>
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
                        </dl>
                    </li>

                </template>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    props: ['entity', 'type'],
    emits: ['updateEntity'],
    methods: {
        get: function (type, symbol, endpoint = null) {
            this.$emit('updateEntity', type, symbol, endpoint);
        }
    },
}
</script>
