<template>
    <div class="container">
        <h1>Space Traders</h1>
        <div class="row gy-3 error" :class="error.length && 'd-block'">
            <div class="col-sm-12">
                <div class="p-3 mb-3 text-bg-danger rounded-3">{{ error }}</div>
            </div>
        </div>
        <div class="row gy-3" :class="{ loading }">
            <template v-for="entity in this.entityTypes">
                <Card :entity="this[entity]" :type="entity" @updateEntity="get" />
            </template>
        </div>
    </div>
</template>
<script>

import Card from "./components/Card.vue";
const entityTypes = ['agent', 'ship', 'shipyard', 'market', 'waypoint', 'system', 'faction', 'contract'];
export default {
    components: {Card},
    data() {
        return {
            entityTypes,
            ...entityTypes.reduce((acc, key) => {
                acc[key] = {};
                return acc;
            }, {}),
            loading: false,
            error: ''
        };
    },
    mounted() {
        entityTypes.forEach(entity => {
            if (localStorage.getItem(entity)) {
                this[entity] = JSON.parse(localStorage.getItem(entity));
            }
        });
    },
    created() {
        axios.get('api/agent').then(response => this.agent = response.data);
    },
    methods: {
        get(type, url) {
            this.loading = true;
            axios.get(`api/${url}`).then(response => {
                const data = response.data;

                if (!data.symbol && data.id) {
                    data.symbol = data.id;
                }

                if (data.faction && data.faction.symbol) {
                    data.factionSymbol = data.faction.symbol;
                }

                if (type === 'waypoint') {
                    this.market = {};
                    this.shipyard = {};
                    this.system = {};
                    localStorage.removeItem('market');
                    localStorage.removeItem('shipyard');
                    localStorage.removeItem('system');
                }


                localStorage.setItem(type, JSON.stringify(data));
                this[type] = data;
                this.loading = false;
            }).catch(error => {
                this.error = `GET api/${url}: ` + error;
                console.log(this.error);
                this.loading = false;
            })
        }
    }
}
</script>
