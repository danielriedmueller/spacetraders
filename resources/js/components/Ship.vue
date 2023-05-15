<template>
    <div v-if="entity.symbol" class="col-sm-12 col-md-6 col-xl-3">
        <div class="card">
            <img v-if="entity.image" :src="entity.image" alt="Card image not found">
            <div class="card-body">
                <div>
                    <a class="card-link text-muted" data-bs-toggle="collapse" :href="'#' + entity.symbol" role="button">Show
                        Info</a>
                    <div class="collapse" :id="entity.symbol">
                        <div v-if="entity.imagePrompt" class="text-muted">{{ entity.imagePrompt }}</div>
                        <pre>{{ entity }}</pre>
                    </div>
                </div>
                <h5 class="card-title">{{ entity.symbol }}</h5>
                <button v-if="entity.nav.status !== 'IN_ORBIT'" @click.prevent="post(`my/ships/${entity.symbol}/orbit`)"
                        class="btn btn-primary">Orbit
                </button>
                <template v-if="entity.nav.status !== 'DOCKED'">
                    <button @click.prevent="post(`my/ships/${entity.symbol}/dock`)" class="btn btn-primary me-3">Dock</button>
                    <button v-if="entity.nav.flightMode !== 'BURN'"
                            @click.prevent="post(`my/ships/${entity.symbol}/nav`, {'flightMode': 'BURN'})"
                            class="btn btn-secondary me-1">Burn
                    </button>
                    <button v-if="entity.nav.flightMode !== 'CRUISE'"
                            @click.prevent="post(`my/ships/${entity.symbol}/nav`, {'flightMode': 'CRUISE'})"
                            class="btn btn-secondary me-1">Cruise
                    </button>
                    <button v-if="entity.nav.flightMode !== 'DRIFT'"
                            @click.prevent="post(`my/ships/${entity.symbol}/nav`, {'flightMode': 'DRIFT'})"
                            class="btn btn-secondary me-1">Drift
                    </button>
                    <button v-if="entity.nav.flightMode !== 'STEALTH'"
                            @click.prevent="post(`my/ships/${entity.symbol}/nav`, {'flightMode': 'STEALTH'})"
                            class="btn btn-secondary">Stealth
                    </button>
                </template>
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

                <!-- Faction -->
                <template v-if="entity.factionSymbol">
                    <li class="list-group-item">
                        <dl>
                            <dt>Faction</dt>
                            <dd><a href="#" @click.prevent="get(`faction/${entity.factionSymbol}`)"
                                   class="card-link">{{ entity.factionSymbol }}</a></dd>
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
                                   @click.prevent="get(`faction/${entity.registration.factionSymbol}`)"
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
                                   @click.prevent="get(`waypoint/${entity.nav.waypointSymbol}`)"
                                   class="card-link">{{ entity.nav.waypointSymbol }}</a></dd>
                            <dt>Status</dt>
                            <dd>{{ entity.nav.status }}</dd>
                            <dt>Flight mode</dt>
                            <dd>{{ entity.nav.flightMode }}</dd>
                        </dl>
                    </li>
                </template>

                <!-- Route -->
                <template v-if="entity.nav && entity.nav.route">
                    <li class="list-group-item">
                        <h4>Route</h4>
                        <dl>
                            <dt>Departure</dt>
                            <dd><a href="#"
                                   @click.prevent="get(`waypoint/${entity.nav.route.departure.symbol}`)"
                                   class="card-link">{{ entity.nav.route.departure.symbol }}</a> {{ entity.nav.route.departureTime }}</dd>
                            <dt>Destination</dt>
                            <dd><a href="#"
                                   @click.prevent="get(`waypoint/${entity.nav.route.destination.symbol}`)"
                                   class="card-link">{{ entity.nav.route.destination.symbol }}</a> {{ entity.nav.route.arrival }}</dd>
                        </dl>
                    </li>
                </template>

                <!-- Crew -->
                <template v-if="entity.crew">
                    <li class="list-group-item">
                        <h4>Crew</h4>
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

                <!-- Fuel -->
                <template v-if="entity.fuel">
                    <li class="list-group-item">
                        <h4>Fuel</h4>
                        <dl>
                            <dt>Current</dt>
                            <dd>{{ entity.fuel.current }}</dd>
                            <dt>Capacity</dt>
                            <dd>{{ entity.fuel.capacity }}</dd>
                            <dt>Consumend</dt>
                            <dd>{{ entity.fuel.consumed.amount }} {{ entity.fuel.consumed.timestamp }}</dd>
                        </dl>
                    </li>
                </template>

                <!-- Cargo -->
                <template v-if="entity.cargo">
                    <li class="list-group-item">
                        <h4>Cargo</h4>
                        <dl>
                            <dt>Capacity</dt>
                            <dd>{{ entity.cargo.capacity }}</dd>
                            <dt>Units</dt>
                            <dd>{{ entity.cargo.units }}</dd>
                            <dt>Inventory</dt>
                            <dd v-for="item in entity.cargo.inventory">
                                <dl>
                                    <dt>Name</dt>
                                    <dd>{{ item.name }}</dd>
                                    <dt>Description</dt>
                                    <dd>{{ item.description }}</dd>
                                    <dt>Units</dt>
                                    <dd>{{ item.units }}</dd>
                                </dl>
                            </dd>
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
    props: ['entity'],
    emits: ['get', 'post'],
    methods: {
        get: function (url) {
            this.$emit('get', url);
        },
        post: function (url, data = []) {
            this.$emit('post', url, data);
        },
    },
}
</script>
