<template>
    <div class="container">
        <h1>Space Traders</h1>
        <div class="row gy-3">
            <Card :entity="agent" @updateEntity="get" />
            <Card :entity="waypoint" @updateEntity="get" />
            <Card :entity="system" @updateEntity="get" />
            <Card :entity="faction" @updateEntity="get" />
        </div>
    </div>
</template>
<script>

import Card from "./components/Card.vue";

export default {
    components: {Card},
    data() {
        let data = {};

        ['agent', 'waypoint', 'system', 'faction'].forEach(entity => {
            data[entity] = localStorage.getItem(entity) ? JSON.parse(localStorage.getItem(entity)) : {};
        });

        return data;
    },
    created() {
        axios.get('api/agent').then(response => this.agent = response.data);
    },
    methods: {
        get(type, symbol) {
            axios.get(`api/${type}/${symbol}`).then(response => {
                const data = response.data;
                localStorage.setItem(type, JSON.stringify(data));
                this[type] = data;
            });
        }
    }
}
</script>
