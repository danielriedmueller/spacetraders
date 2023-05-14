<template>
    <div class="container">
        <h1>Space Traders</h1>
        <div class="row gy-3 error" :class="error.length && 'd-block'">
            <div class="col-sm-12">
                <div class="p-3 mb-3 text-bg-danger rounded-3">{{ error }}</div>
            </div>
        </div>
        <div class="row gy-3" :class="{ loading }">
            <Card :entity="agent" @updateEntity="get" />
            <Card :entity="ship" @updateEntity="get" />
            <Card :entity="waypoint" @updateEntity="get" />
            <Card :entity="system" @updateEntity="get" />
            <Card :entity="shipyard" @updateEntity="get" />
        </div>
    </div>
</template>
<script>

import Card from "./components/Card.vue";

export default {
    components: {Card},
    data() {
        return {
            agent: {},
            waypoint: {},
            system: {},
            faction: {},
            ship: {},
            shipyard: {},
            loading: false,
            error: ''
        };
    },
    mounted() {
        ['agent', 'waypoint', 'system', 'faction', 'ship', 'shipyard'].forEach(entity => {
            this[entity] = localStorage.getItem(entity) ? JSON.parse(localStorage.getItem(entity)) : {};
        });
    },
    created() {
        axios.get('api/agent').then(response => this.agent = response.data);
    },
    methods: {
        get(type, symbol, endpoint = null) {
            if (!endpoint) {
                endpoint = type;
            }
            this.loading = true;
            axios.get(`api/${endpoint}/${symbol}`).then(response => {
                const data = response.data;
                localStorage.setItem(type, JSON.stringify(data));
                this[type] = data;
                this.loading = false;
            }).catch(error => {
                this.error = `GET api/${endpoint}/${symbol}: ` + error;
                this.loading = false;
            })
        }
    }
}
</script>
