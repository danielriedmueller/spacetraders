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
                <!-- Sector -->
                <template v-if="entity.sectorSymbol">
                    <li class="list-group-item">
                        <dl>
                            <dt>Sector</dt>
                            <dd>{{ entity.sectorSymbol }}</dd>
                        </dl>
                    </li>
                </template>

                <!-- Type -->
                <template v-if="entity.type">
                    <li class="list-group-item">
                        <dl>
                            <dt>Type</dt>
                            <dd>{{ entity.type }}</dd>
                        </dl>
                    </li>
                </template>

                <!-- Waypoints -->
                <template v-if="entity.waypoints && entity.waypoints.length > 0">
                    <li class="list-group-item">
                        <dl>
                            <dt>Waypoints</dt>
                            <dd v-for="waypoint in entity.waypoints">
                                <b>{{ waypoint.type }}</b>: <a href="#"
                                                               @click.prevent="get(`waypoint/${waypoint.symbol}`)"
                                                               class="card-link">{{ waypoint.symbol }}</a>
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
