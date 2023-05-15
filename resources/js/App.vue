<template>
    <div class="row gy-3 error" :class="error.length && 'd-block'">
        <div class="col-sm-12">
            <div class="p-3 mb-3 text-bg-danger rounded-3">{{ error }}</div>
        </div>
    </div>
    <div class="accordion" id="accordion">
        <Item v-for="entity in entityTypes" :entity="this[entity]" @get="get" @post="post"/>
    </div>
</template>
<script>

import Agent from "./components/Agent.vue";
import Waypoint from "./components/Waypoint.vue";
import Ship from "./components/Ship.vue";
import Shipyard from "./components/Shipyard.vue";
import Marketplace from "./components/Marketplace.vue";
import System from "./components/System.vue";
import Contract from "./components/Contract.vue";
import Faction from "./components/Faction.vue";
import Item from "./components/Item.vue";

const entityTypes = ['agent', 'ship', 'shipyard', 'market', 'waypoint', 'system', 'faction', 'contract'];
export default {
    components: {Item, Faction, Contract, System, Marketplace, Shipyard, Ship, Waypoint, Agent},
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
        if (!localStorage.getItem('foo')) {
            this.loading = true;
            axios.get('api/agent').then(response => {
                this.loading = false;
                this.agent = response.data;
                localStorage.setItem('agent', JSON.stringify(this.agent));
            });
        }
    },
    methods: {
        get(url) {
            this.loading = true;
            axios.get(`api/${url}`).then(response => {
                const data = response.data;

                if (!data.symbol && data.id) {
                    data.symbol = data.id;
                }

                if (data.faction && data.faction.symbol) {
                    data.factionSymbol = data.faction.symbol;
                }

                if (data.class === 'waypoint') {
                    this.market = {};
                    this.shipyard = {};
                    this.system = {};
                    localStorage.removeItem('market');
                    localStorage.removeItem('shipyard');
                    localStorage.removeItem('system');
                }

                localStorage.setItem(data.class, JSON.stringify(data));
                this[data.class] = data;
                this.loading = false;
            }).catch(error => {
                this.error = `GET api/${url}: ` + error;
                console.log(this.error);
                this.loading = false;
            })
        },
        post(url, data) {
            this.loading = true;
            axios.post(`api/${url}`, data).then(response => {
                const data = response.data;
                Object.keys(data).forEach(entity => {
                    Object.keys(data[entity]).forEach(property => {
                        this[entity][property] = data[entity][property];
                    });

                    localStorage.setItem(entity, JSON.stringify(this[entity]));
                });

                this.loading = false;
            }).catch(error => {
                this.error = `POST api/${url}: ` + error;
                console.log(this.error);
                this.loading = false;
            })
        },
    }
}
</script>
