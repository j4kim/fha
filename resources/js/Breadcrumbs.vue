<script setup>
import ChevronIcon from './ChevronIcon.vue';
import breadcrumbs from './breadcrumbs';
</script>

<template>
    <div class="flex gap-1 sm:gap-2 gap-y-0 items-center flex-wrap">
        <template v-for="({ text, href }, i) in breadcrumbs.items">
            <a :href="href" class="text-sm sm:text-lg"
                :class="{ 'text-indigo-700': !!href }">
                {{ text }}
            </a>

            <ChevronIcon v-if="i < breadcrumbs.items.length - 1" class="h-3 sm:h-4" />
        </template>
    </div>
</template>
