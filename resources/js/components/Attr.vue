<script setup>
defineProps({
    label: String,
    value: String | Number,
    valueClass: {
        type: String,
        default: "",
    },
});
</script>

<template>
    <div>
        <div class="text-sm opacity-50">{{ label }}</div>
        <div :class="valueClass">{{ value }}</div>
    </div>
</template>
