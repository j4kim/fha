<script setup>
import { useRoute } from 'vue-router';
import ChevronIcon from './ChevronIcon.vue';

const route = useRoute();
</script>

<template>
    <div class="flex gap-1 sm:gap-2 gap-y-0 items-center flex-wrap">
        <template v-for="({ text, href }, i) in route.meta.breadcrumbs">
            <a :href="href" class="text-sm sm:text-lg" :class="{ 'text-indigo-700': !!href }">
                {{ text }}
            </a>

            <ChevronIcon v-if="i < route.meta.breadcrumbs.length - 1" class="h-3 sm:h-4" />
        </template>
    </div>
</template>
