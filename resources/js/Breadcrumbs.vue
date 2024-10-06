<script setup>
import { useRoute } from "vue-router";
import ChevronIcon from "./ChevronIcon.vue";
import store from "./store";
</script>

<template>
    <div class="flex gap-1 sm:gap-2 gap-y-0 items-center flex-wrap">
        <template v-for="(breadcrumb, i) in store.breadcrumbs">
            <RouterLink
                :to="breadcrumb.route"
                class="text-sm sm:text-lg text-indigo-700"
            >
                {{ breadcrumb.text }}
            </RouterLink>

            <ChevronIcon
                v-if="i < store.breadcrumbs.length - 1"
                class="h-3 sm:h-4"
            />
        </template>
    </div>
</template>
