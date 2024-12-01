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
store.breadcrumbs = route.meta.getBreadcrumbs(state.fund);
store.menu = route.meta.getMenu(state.fund);

async function submit() {
    const data = pick(state.fund, ["ref", "name", "description"]);
    await api(`/api/funds/${state.fund.id}`, "put", data);
    router.push(`/funds/${state.fund.id}`);
}
</script>

<template>
    <FundForm :form="state.fund" @submit="submit" />
</template>
