<template>
    <div v-if="entity.symbol" class="col-sm-12 col-md-6 col-xl-3">
        <div class="card">
            <img v-if="entity.image" :src="entity.image" alt="Card image not found">
            <div class="card-body">
                <div>
                    <a class="card-link text-muted" data-bs-toggle="collapse" :href="'#' + entity.symbol" role="button">Show Info</a>
                    <div class="collapse" :id="entity.symbol">
                        <div v-if="entity.imagePrompt" class="text-muted">{{ entity.imagePrompt }}</div>
                        <pre>{{ entity }}</pre>
                    </div>
                </div>
                <h5 class="card-title">{{ entity.symbol }}</h5>
                <div v-for="(item, key) in entity.actions">
                    <a href="#" @click.prevent="post(item[0], item[1])"
                       class="btn btn-primary">{{ key }}</a>
                </div>
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

                <!-- Description -->
                <template v-if="entity.description">
                    <li class="list-group-item">
                        <dl>
                            <dt>Description</dt>
                            <dd>{{ entity.description }}</dd>
                        </dl>
                    </li>
                </template>

                <!-- Headquarters -->
                <template v-if="entity.headquarters">
                    <li class="list-group-item">
                        <dl>
                            <dt>Headquarters</dt>
                            <dd><a href="#" @click.prevent="get(`waypoint/${entity.headquarters}`)"
                                   class="card-link">{{ entity.headquarters }}</a></dd>
                        </dl>
                    </li>
                </template>

                <!-- Traits -->
                <template v-if="entity.traits && entity.traits.length > 0">
                    <li class="list-group-item">
                        <dl>
                            <dt>Traits</dt>
                            <dd v-for="trait in entity.traits">
                                <b>
                                    <span v-if="trait.symbol === 'SHIPYARD'"><a href="#"
                                                                                @click.prevent="get(`systems/${entity.systemSymbol}/waypoints/${entity.symbol}/shipyard`)"
                                                                                class="card-link">{{
                                            trait.name
                                        }}</a></span>
                                    <span v-else-if="trait.symbol === 'MARKETPLACE'"><a href="#"
                                                                                        @click.prevent="get(`systems/${entity.systemSymbol}/waypoints/${entity.symbol}/market`)"
                                                                                        class="card-link">{{
                                            trait.name
                                        }}</a></span>
                                    <span v-else>{{ trait.name }}</span>
                                </b>: {{ trait.description }}
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
        post: function (url, data) {
            this.$emit('post', url, data);
        },
    },
}
</script>
