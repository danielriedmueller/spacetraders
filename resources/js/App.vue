<template>
    Credits: {{ agent.credits }}
    HQ: <button @click="getWaypoint(agent.headquarters)">{{ agent.headquarters }}</button>
    <div v-if="agent.waypoint">
        <img :src="agent.waypoint.image" />
    </div>
    <li v-for="faction in factions">
        <img :src="faction.image" />
        {{ faction.headquarters }}
    </li>
</template>
<script>

export default {
    data() {
        return {
            factions: [],
            agent: []
        }
    },
    created() {
        //axios.get('api/factions').then(response => this.factions = response.data);
        axios.get('api/agent').then(response => this.agent = response.data);
    },
    methods: {
        getWaypoint(symbol) {
            axios.get(`api/waypoint/${symbol}`).then(response => this.agent.waypoint = response.data);
        }
    }
}
</script>
