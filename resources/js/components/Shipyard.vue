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
                <!-- ShipTypes -->
                <template v-if="entity.shipTypes && entity.shipTypes.length > 0">
                    <li class="list-group-item">
                        <dl>
                            <dt>Ship Types</dt>
                            <dd v-for="item in entity.shipTypes">{{ item.type }}</dd>
                        </dl>
                    </li>
                </template>

                <!-- Transactions -->
                <template v-if="entity.transactions && entity.transactions.length > 0">
                    <li class="list-group-item">
                        <h4>Transactions</h4>
                        <dl v-for="item in entity.transactions">
                            <dt>Ship</dt>
                            <dd>{{ item.shipSymbol }}</dd>
                            <dt>Price</dt>
                            <dd>{{ $f.credits(item.price) }}</dd>
                            <dt>Agent</dt>
                            <dd>{{ item.agentSymbol }}</dd>
                            <dt>Date</dt>
                            <dd>{{ $f.date(item.timestamp)}}</dd>
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
