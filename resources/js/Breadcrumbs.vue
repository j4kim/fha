<script setup>
import { useRoute } from "vue-router";
import ChevronIcon from "./ChevronIcon.vue";
import { computed } from "vue";

const route = useRoute();

function getBreadcrumbs(route) {
    if (!route) return [];
    return [...getBreadcrumbs(route.meta.parent), route];
}

const breadcrumbs = computed(() => getBreadcrumbs(route));
</script>

<template>
    <div class="flex gap-1 sm:gap-2 gap-y-0 items-center flex-wrap">
        <template v-for="(bcRoute, i) in breadcrumbs">
            <RouterLink
                :to="bcRoute"
                class="text-sm sm:text-lg text-indigo-700"
            >
                {{ bcRoute.name }}
            </RouterLink>

            <ChevronIcon v-if="i < breadcrumbs.length - 1" class="h-3 sm:h-4" />
        </template>
    </div>
</template>
