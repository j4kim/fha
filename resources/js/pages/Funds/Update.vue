<script setup>
import { api, get } from "../../api";
import store from "../../store";
import router from "../../router";
import FundForm from "./FundForm.vue";
import { useRoute } from "vue-router";
import { reactive } from "vue";
import { pick } from "lodash-es";

const route = useRoute();

const state = reactive({
    fund: {},
});

state.fund = await get(`/api/funds/${route.params.fundId}`);

async function submit() {
    const data = pick(state.fund, ["ref", "name", "description"]);
    await api(`/api/funds/${state.fund.id}`, "put", data);
    router.push(`/funds/${state.fund.id}`);
}

store.breadcrumbs = [
    { text: "Funds", route: "/funds/" },
    { text: state.fund.ref, route: `/funds/${state.fund.id}` },
    { text: "Update" },
];
store.menu = [{ text: "Delete fund", route: `/funds/${state.fund.id}/delete` }];
</script>

<template>
    <FundForm :form="state.fund" @submit="submit" />
</template>
