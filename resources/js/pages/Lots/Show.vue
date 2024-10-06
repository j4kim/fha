<script setup>
import { reactive } from "vue";
import { useRoute, useRouter } from "vue-router";
import Attr from "../../Attr.vue";
import store from "../../store";
import { get } from "../../api";

const route = useRoute();
const router = useRouter();

const state = reactive({
    lot: {},
});

state.lot = await get(`/api/lots/${route.params.lotId}`);

const fundRoute = router.resolve(`/funds/${state.lot.fund.id}`);

store.breadcrumbs = [
    ...fundRoute.meta.getBreadcrumbs(state.lot.fund),
    { text: `Lot ${state.lot.ref}`, route: `${state.lot.id}` },
];
</script>

<template>
    <div class="flex flex-col gap-6">
        <div class="flex flex-col gap-4" v-if="state.lot">
            <Attr label="Ref" :value="state.lot.ref" />
            <Attr label="Name" :value="state.lot.name" />
            <Attr
                label="Description"
                :value="state.lot.description"
                class="whitespace-pre-line"
            />
        </div>
    </div>
</template>
