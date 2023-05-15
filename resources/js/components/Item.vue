<template>
    <div v-if="entity.class" class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    :data-bs-target="'#collapse-' + entity.class" aria-expanded="false">
                {{ entity.symbol }}<span class="ms-3 badge bg-secondary">{{ entity.class }}</span>
            </button>
        </h2>
        <div :id="'collapse-' + entity.class" class="accordion-collapse collapse" data-bs-parent="#accordion">
            <div class="accordion-body">
                <Agent v-if="entity.class === 'agent'" :entity="entity" @get="get" @post="post"/>
                <Waypoint v-if="entity.class === 'waypoint'" :entity="entity" @get="get" @post="post"/>
                <Contract v-if="entity.class === 'contract'" :entity="entity" @get="get" @post="post"/>
                <Faction v-if="entity.class === 'faction'" :entity="entity" @get="get" @post="post"/>
                <Ship v-if="entity.class === 'ship'" :entity="entity" @get="get" @post="post"/>
                <Marketplace v-if="entity.class === 'market'" :entity="entity" @get="get" @post="post"/>
                <Shipyard v-if="entity.class === 'shipyard'" :entity="entity" @get="get" @post="post"/>
                <System v-if="entity.class === 'system'" :entity="entity" @get="get" @post="post"/>
            </div>
        </div>
    </div>
</template>

<script>
import Agent from "./Agent.vue";
import Waypoint from "./Waypoint.vue";
import Contract from "./Contract.vue";
import Shipyard from "./Shipyard.vue";
import Marketplace from "./Marketplace.vue";
import Ship from "./Ship.vue";
import Faction from "./Faction.vue";
import System from "./System.vue";

export default {
    components: {System, Faction, Ship, Marketplace, Shipyard, Contract, Waypoint, Agent},
    props: ['entity'],
    emits: ['get', 'post'],
    methods: {
        get: function (url) {
            this.$emit('get', url);
        },
        post: function (url, data) {
            this.$emit('post', url, data);
        },
    },
}
</script>
