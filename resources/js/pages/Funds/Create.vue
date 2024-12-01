<script setup>
import { post } from "../../api";
import store from "../../store";
import router from "../../router";
import FundForm from "./FundForm.vue";

store.breadcrumbs = [{ text: "Funds", route: "/funds/" }, { text: "New" }];
store.menu = [];

const form = {
    ref: "",
    name: "",
    description: "",
};

async function submit() {
    const fund = await post("/api/funds", form);
    router.push(`/funds/${fund.id}`);
}
</script>

<template>
    <FundForm :form="form" @submit="submit" />
</template>
