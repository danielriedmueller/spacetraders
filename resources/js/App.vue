<template>
    <div class="container">
        <h1>Space Traders</h1>
        <div class="row gy-3">
            <div class="col-12">
                <div class="p-3 border bg-light">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ agent.symbol }}</h5>
                            <dl>
                                <dt>Credits</dt>
                                <dd>{{ agent.credits }}</dd>
                                <dt>Headquarters</dt>
                                <dd><a href="#" @click="get('waypoint', agent.headquarters, 'waypoint')" class="btn btn-secondary">{{ agent.headquarters }}</a></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="waypoint.image" class="col-12">
                <div class="p-3 border bg-light">
                    <div class="card">
                        <img v-if="waypoint" class="card-img-top" :src="waypoint.image" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Waypoint {{ agent.headquarters }}</h5>
                            <dl v-if="waypoint">
                                <dt>Faction</dt>
                                <dd>{{ waypoint.faction.symbol }}</dd>
                                <dt>System</dt>
                                <dd><a href="#" @click="get('system', waypoint.systemSymbol, 'system')" class="btn btn-secondary">{{ waypoint.systemSymbol }}</a></dd>
                                <dt>Type</dt>
                                <dd>{{ waypoint.type }}</dd>
                                <dt>Orbitals</dt>
                                <dd v-for="orbital in waypoint.orbitals">
                                  <a href="#" @click="get('waypoint', orbital.symbol, 'waypoint')" class="btn btn-secondary">{{ orbital.symbol }}</a>
                                </dd>
                                <dt>Traits</dt>
                                <dd v-for="trait in waypoint.traits">
                                    <b>{{ trait.name }}</b>: {{ trait.description }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="system.factions" class="col-12">
                <div class="p-3 border bg-light">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">System {{ waypoint.systemSymbol }}</h5>
                            <dl v-if="system">
                                <dt>Factions</dt>
                                <dd v-for="faction in system.factions">{{ faction.symbol }}</dd>
                                <dt>Sector</dt>
                                <dd>{{ system.sectorSymbol }}</dd>
                                <dt>Type</dt>
                                <dd>{{ system.type }}</dd>
                                <dt>Waypoints</dt>
                                <dd v-for="waypoint in system.waypoints">
                                    <b>{{ waypoint.type }}</b>: <a href="#" @click="get('waypoint', waypoint.symbol, 'waypoint')" class="btn btn-secondary">{{ waypoint.symbol }}</a>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    data() {
        return {
            agent: {},
            waypoint: {},
            system: {}
        }
    },
    created() {
        axios.get('api/agent').then(response => this.agent = response.data);
    },
    methods: {
        get(type, symbol, data) {
            axios.get(`api/${type}/${symbol}`).then(response => this[data] = response.data);
        }
    }
}
</script>
