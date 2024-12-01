<script setup>
import { reactive } from "vue";
import { useRoute } from "vue-router";
import Attr from "../../components/Attr.vue";
import store from "../../store";
import { get } from "../../api";

const route = useRoute();

const state = reactive({
    lot: {},
});

state.lot = await get(`/api/lots/${route.params.lotId}`);

store.breadcrumbs = [
    { text: "Funds", route: "/funds/" },
    { text: state.lot.fund.ref, route: `/funds/${state.lot.fund.id}` },
    { text: `Lot ${state.lot.ref}` },
];
store.menu = [];
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
