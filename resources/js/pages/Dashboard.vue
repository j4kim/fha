<script setup>
import { reactive } from "vue";
import store from "../store";
import { get } from "../api";

const state = reactive({
    funds: [],
});

store.breadcrumbs = [{ text: "Dashboard", route: "/" }];

state.funds = await get("/api/funds/recent");
</script>

<template>
    <div class="block sm:grid grid-cols-2">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg space-y-4">
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    Recently updated funds
                </h2>
            </header>

            <div>
                <a
                    :href="`funds/${fund.id}`"
                    v-for="fund in state.funds"
                    class="block p-2 hover:bg-gray-100"
                >
                    {{ fund.ref }}
                    <span class="font-medium">{{ fund.name }}</span>
                </a>
            </div>

            <p>
                <a href="/funds" class="text-indigo-700 hover:underline">
                    View all funds
                </a>
            </p>
        </div>
    </div>
</template>
