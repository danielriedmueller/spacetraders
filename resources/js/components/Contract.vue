<template>
    <div v-if="entity.symbol" class="col-sm-12 col-md-6 col-xl-3">
        <div class="card">
            <h5 class="card-header text-center">Contract</h5>
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

                <!-- Type -->
                <template v-if="entity.type">
                    <li class="list-group-item">
                        <dl>
                            <dt>Type</dt>
                            <dd>{{ entity.type }}</dd>
                        </dl>
                    </li>
                </template>

                <!-- Contract terms -->
                <template v-if="entity.terms">
                    <li class="list-group-item">
                        <dl>
                            <dt>Deadline</dt>
                            <dd>{{ entity.terms.deadline }}</dd>
                            <dt>Payment on accepted</dt>
                            <dd>{{ entity.terms.payment.onAccepted }}</dd>
                            <dt>Payment on fulfilled</dt>
                            <dd>{{ entity.terms.payment.onFulfilled }}</dd>
                            <dt>Deliver</dt>
                            <dd v-for="item in entity.terms.deliver">
                                <dl>
                                    <dt>Trade</dt>
                                    <dd>{{ item.tradeSymbol }}</dd>
                                    <dt>Destination</dt>
                                    <dd><a href="#"
                                           @click.prevent="get(`waypoint/${item.destinationSymbol}`)"
                                           class="card-link">{{ item.destinationSymbol }}</a></dd>
                                    <dt>Units required</dt>
                                    <dd>{{ item.unitsRequired }}</dd>
                                    <dt>Units fulfilled</dt>
                                    <dd>{{ item.unitsFulfilled }}</dd>
                                </dl>
                            </dd>
                            <dt>Accepted</dt>
                            <dd>{{ entity.accepted }}</dd>
                            <dt>Fulfilled</dt>
                            <dd>{{ entity.fulfilled }}</dd>
                            <dt>Expiration</dt>
                            <dd>{{ entity.expiration }}</dd>
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
