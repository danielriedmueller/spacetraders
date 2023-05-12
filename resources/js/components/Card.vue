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
                            <dd><a href="#" @click="get('waypoint', entity.headquarters, 'waypoint')"
                                   class="btn btn-secondary">{{ entity.headquarters }}</a></dd>
                        </template>
                        <!-- Faction -->
                        <template v-if="entity.faction && entity.faction.symbol">
                            <dt>Faction</dt>
                            <dd><a href="#" @click="get('faction', entity.faction.symbol, 'faction')"
                                   class="btn btn-secondary">{{ entity.faction.symbol }}</a></dd>
                        </template>
                        <!-- Factions -->
                        <template v-if="entity.factions && entity.factions.length > 0">
                            <dt>Factions</dt>
                            <dd v-for="faction in entity.factions">
                                <a href="#" @click="get('faction', faction.symbol, 'faction')"
                                   class="btn btn-secondary">{{ faction.symbol }}</a>
                            </dd>
                        </template>
                        <!-- System -->
                        <template v-if="entity.systemSymbol">
                            <dt>System</dt>
                            <dd><a href="#" @click="get('system', entity.systemSymbol, 'system')"
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
                                                               @click="get('waypoint', waypoint.symbol, 'waypoint')"
                                                               class="btn btn-secondary">{{ waypoint.symbol }}</a>
                            </dd>
                        </template>
                        <!-- Orbitals -->
                        <template v-if="entity.orbitals && entity.orbitals.length > 0">
                            <dt>Orbitals</dt>
                            <dd v-for="orbital in entity.orbitals">
                                <a href="#" @click="get('waypoint', orbital.symbol, 'waypoint')"
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
        get: function (type, symbol) {
            this.$emit('updateEntity', type, symbol);
        }
    },
}
</script>
