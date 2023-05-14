<template>
    <div v-if="entity.symbol" class="col-sm-12 col-md-6 col-xl-3">
        <div class="card">
            <h5 class="card-header text-center">{{ type.toUpperCase() }}</h5>
            <img v-if="entity.image" :src="entity.image" alt="Card image not found">
            <div class="card-body">
                <div>
                    <div class="collapse" id="data">
                        <div v-if="entity.imagePrompt" class="text-muted">{{ entity.imagePrompt }}</div>
                        <pre>{{ entity }}</pre>
                    </div>
                </div>
                <h5 class="card-title">{{ entity.symbol }}</h5>
                <div v-for="(item, key) in entity.actions">
                    <a href="#" @click.prevent="post(item, [])"
                       class="btn btn-primary">{{ key }}</a>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <!-- ShipTypes -->
                <template v-if="entity.shipTypes && entity.shipTypes.length > 0">
                    <li class="list-group-item">
                        <dl>
                            <dt>Ship Types</dt>
                            <dd v-for="item in entity.shipTypes">{{ item.type }}</dd>
                        </dl>
                    </li>
                </template>

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

                <!-- Contracts -->
                <template v-if="entity.contracts && entity.contracts.length > 0">
                    <li class="list-group-item">
                        <dl>
                            <dt>Contracts</dt>
                            <dd v-for="item in entity.contracts">
                                <a href="#" @click.prevent="get('contract', `my/contracts/${item.id}`)"
                                   class="card-link">{{ item.id }}</a>
                            </dd>
                        </dl>
                    </li>
                </template>

                <!-- Headquarters -->
                <template v-if="entity.headquarters">
                    <li class="list-group-item">
                        <dl>
                            <dt>Headquarters</dt>
                            <dd><a href="#" @click.prevent="get('waypoint', `waypoint/${entity.headquarters}`)"
                                   class="card-link">{{ entity.headquarters }}</a></dd>
                        </dl>
                    </li>
                </template>

                <!-- Faction -->
                <template v-if="entity.factionSymbol">
                    <li class="list-group-item">
                        <dl>
                            <dt>Faction</dt>
                            <dd><a href="#" @click.prevent="get('faction', `faction/${entity.factionSymbol}`)"
                                   class="card-link">{{ entity.factionSymbol }}</a></dd>
                        </dl>
                    </li>
                </template>

                <!-- Factions -->
                <template v-if="entity.factions && entity.factions.length > 0">
                    <li class="list-group-item">
                        <dl>
                            <dt>Factions</dt>
                            <dd v-for="faction in entity.factions">
                                <a href="#" @click.prevent="get('faction', `faction/${faction.symbol}`)"
                                   class="card-link">{{ faction.symbol }}</a>
                            </dd>
                        </dl>
                    </li>
                </template>

                <!-- System -->
                <template v-if="entity.systemSymbol">
                    <li class="list-group-item">
                        <dl>
                            <dt>System</dt>
                            <dd><a href="#" @click.prevent="get('system', `system/${entity.systemSymbol}`)"
                                   class="card-link">{{ entity.systemSymbol }}</a></dd>
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
                                                               @click.prevent="get('waypoint', `waypoint/${waypoint.symbol}`)"
                                                               class="card-link">{{ waypoint.symbol }}</a>
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
                                <a href="#" @click.prevent="get('waypoint', `waypoint/${orbital.symbol}`)"
                                   class="card-link">{{ orbital.symbol }}</a>
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
                                <b>
                                    <span v-if="trait.symbol === 'SHIPYARD'"><a href="#"
                                                                                @click.prevent="get('shipyard', `systems/${entity.systemSymbol}/waypoints/${entity.symbol}/shipyard`)"
                                                                                class="card-link">{{
                                            trait.name
                                        }}</a></span>
                                    <span v-else-if="trait.symbol === 'MARKETPLACE'"><a href="#"
                                                                                        @click.prevent="get('market', `systems/${entity.systemSymbol}/waypoints/${entity.symbol}/market`)"
                                                                                        class="card-link">{{
                                            trait.name
                                        }}</a></span>
                                    <span v-else>{{ trait.name }}</span>
                                </b>: {{ trait.description }}
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
                                <a href="#" @click.prevent="get('ship', `my/ships/${ship.symbol}`)"
                                   class="card-link">{{ ship.symbol }}</a>
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
                            <dd><a href="#"
                                   @click.prevent="get('faction', `faction/${entity.registration.factionSymbol}`)"
                                   class="card-link">{{ entity.registration.factionSymbol }}</a></dd>
                            <dt>Role</dt>
                            <dd>{{ entity.registration.role }}</dd>
                        </dl>
                    </li>
                </template>

                <!-- ShipNavigation -->
                <template v-if="entity.nav">
                    <li class="list-group-item">
                        <dl>
                            <dt>Current Location</dt>
                            <dd><a href="#"
                                   @click.prevent="get('waypoint', `waypoint/${entity.nav.waypointSymbol}`)"
                                   class="card-link">{{ entity.nav.waypointSymbol }}</a></dd>
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

                <!-- Contract terms -->
                <template v-if="entity.terms">
                    <li class="list-group-item">
                        <dl>
                            <dt>Deadline</dt>
                            <dd>{{ entity.terms.deadline }}</dd>
                            <dt>Payment on accepted</dt>
                            <dd>{{ entity.terms.payment.onAccepted }}</dd>
                            <dt>Payment on fulfilled</dt>
                            <dd>{{ entity.terms.payment.onFulfilled }}</dd>
                            <dt>Deliver</dt>
                            <dd v-for="item in entity.terms.deliver">
                                <dl>
                                    <dt>Trade</dt>
                                    <dd>{{ item.tradeSymbol }}</dd>
                                    <dt>Destination</dt>
                                    <dd><a href="#"
                                           @click.prevent="get('waypoint', `waypoint/${item.destinationSymbol}`)"
                                           class="card-link">{{ item.destinationSymbol }}</a></dd>
                                    <dt>Units required</dt>
                                    <dd>{{ item.unitsRequired }}</dd>
                                    <dt>Units fulfilled</dt>
                                    <dd>{{ item.unitsFulfilled }}</dd>
                                </dl>
                            </dd>
                            <dt>Accepted</dt>
                            <dd>{{ entity.accepted }}</dd>
                            <dt>Fulfilled</dt>
                            <dd>{{ entity.fulfilled }}</dd>
                            <dt>Expiration</dt>
                            <dd>{{ entity.expiration }}</dd>
                        </dl>
                    </li>
                </template>
            </ul>
            <div class="card-footer">
                <small class="text-muted">Last updated {{ entity.updatedAt }}</small>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['entity', 'type'],
    emits: ['get', 'post'],
    methods: {
        get: function (type, url) {
            this.$emit('get', type, url);
        },
        post: function (url, data) {
            this.$emit('post', url, data);
        },
    },
}
</script>
