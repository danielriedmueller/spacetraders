<template>
    <div v-if="entity.symbol" class="col-sm-12 col-md-6 col-xl-3">
        <div class="card">
            <h5 class="card-header text-center">Agent</h5>
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

                <!-- Credits -->
                <template v-if="entity.credits">
                    <li class="list-group-item">
                        <dl>
                            <dt>Credits</dt>
                            <dd>{{ entity.credits }}</dd>
                        </dl>
                    </li>
                </template>

                <!-- Contracts -->
                <template v-if="entity.contracts && entity.contracts.length > 0">
                    <li class="list-group-item">
                        <dl>
                            <dt>Contracts</dt>
                            <dd v-for="item in entity.contracts">
                                <a href="#" @click.prevent="get(`my/contracts/${item.id}`)"
                                   class="card-link">{{ item.id }}</a>
                            </dd>
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

                <!-- Faction -->
                <template v-if="entity.factionSymbol">
                    <li class="list-group-item">
                        <dl>
                            <dt>Faction</dt>
                            <dd><a href="#" @click.prevent="get(`faction/${entity.factionSymbol}`)"
                                   class="card-link">{{ entity.factionSymbol }}</a></dd>
                        </dl>
                    </li>
                </template>

                <!-- Ships -->
                <template v-if="entity.ships && entity.ships.length > 0">
                    <li class="list-group-item">
                        <dl>
                            <dt>Ships</dt>
                            <dd v-for="ship in entity.ships">
                                <a href="#" @click.prevent="get(`my/ships/${ship.symbol}`)"
                                   class="card-link">{{ ship.symbol }}</a>
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
