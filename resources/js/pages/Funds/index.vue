<script setup>
import axios from "axios";
import { reactive } from "vue";
import router from "../../router";

const state = reactive({
    search: "",
    funds: [],
    loading: true,
});

axios
    .get("/api/funds")
    .then((response) => {
        state.funds = response.data;
    })
    .finally(() => {
        state.loading = false;
    });
</script>

<template>
    <div class="mb-6 flex justify-between items-center">
        <input
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            type="search"
            placeholder="search"
            v-model="state.search"
        />
    </div>
    <table class="table w-full">
        <thead>
            <tr>
                <th>#</th>
                <th>Ref</th>
                <th>Name</th>
                <th class="hidden sm:table-cell">Description</th>
                <th>Status</th>
                <th class="hidden md:table-cell">Update</th>
            </tr>
        </thead>
        <tbody>
            <tr
                class="cursor-pointer"
                v-for="fund in state.funds"
                @click="router.push(`/funds/${fund.id}`)"
            >
                <td>{{ fund.id }}</td>
                <td>{{ fund.ref }}</td>
                <td>{{ fund.name }}</td>
                <td class="hidden sm:table-cell text-sm lg:text-base">
                    {{ fund.description }}
                </td>
                <td>{{ fund.status }}</td>
                <td class="hidden md:table-cell">
                    {{ fund.updated_at }}
                </td>
            </tr>
        </tbody>
    </table>
    <p v-if="state.loading">Chargement...</p>
</template>
