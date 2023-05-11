<template>
    <div class="container">
        <h1>Space Traders</h1>
        <div class="row gy-3">
            <div class="col-12">
                <div class="p-3 border bg-light"> Credits: {{ agent.credits }}</div>
            </div>
            <div class="col-12">
                <div class="p-3 border bg-light">
                    <div class="card">
                        <img v-if="agent.waypoint" class="card-img-top" :src="agent.waypoint.image" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Headquarters {{ agent.headquarters }}</h5>
                            <dl v-if="agent.waypoint">
                                <dt>Faction</dt>
                                <dd>{{ agent.waypoint.faction.symbol}}</dd>
                                <dt>Type</dt>
                                <dd>{{ agent.waypoint.type }}</dd>
                                <dt>Orbitals</dt>
                                <dd v-for="orbital in agent.waypoint.orbitals">{{ orbital.symbol }}</dd>
                                <dt>Traits</dt>
                                <dd v-for="trait in agent.waypoint.traits">
                                    {{ trait.name }}: {{ trait.description }}
                                </dd>
                            </dl>
                            <a href="#" @click="get('waypoint', agent.headquarters, agent)" class="btn btn-secondary">More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="p-3 border bg-light">Custom column padding</div>
            </div>
            <div class="col-6">
                <div class="p-3 border bg-light">Custom column padding</div>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    data() {
        return {
            agent: []
        }
    },
    created() {
        axios.get('api/agent').then(response => this.agent = response.data);
    },
    methods: {
        get(type, symbol, data) {
            axios.get(`api/${type}/${symbol}`).then(response => data[type] = response.data);
        }
    }
}
</script>
