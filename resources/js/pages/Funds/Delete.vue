<script setup>
import { api, get } from "../../api";
import store from "../../store";
import router from "../../router";
import { useRoute } from "vue-router";
import { reactive } from "vue";

const route = useRoute();

const state = reactive({
    fund: {},
});

state.fund = await get(`/api/funds/${route.params.fundId}`);

async function submit() {
    await api(`/api/funds/${state.fund.id}`, "delete");
    router.push(`/funds/`);
}

store.breadcrumbs = [
    { text: "Funds", route: "/funds/" },
    { text: state.fund.ref, route: `/funds/${state.fund.id}` },
    { text: "Delete" },
];
store.menu = [];
</script>

<template>
    <form @submit.prevent="submit">
        <p class="mb-2">Are you sure you want to delete this fund?</p>
        <button
            class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
        >
            Yes, delete
        </button>
    </form>
</template>
