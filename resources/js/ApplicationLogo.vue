<script setup>
function getAttrs(i) {
    const width = 300 - i * 60;
    const center = 316 / 2;
    const x = center - width / 2;
    return {
        x,
        y: x,
        width,
        height: width,
        transform: `rotate(${18 * i}, ${center}, ${center})`,
        fill: 'none',
        'stroke-width': 4,
        stroke: 'currentColor',
    };
}
</script>

<template>
    <svg viewBox="0 0 316 316" xmlns="http://www.w3.org/2000/svg">
        <rect v-for="i in 6" v-bind="getAttrs(i - 1)" />
    </svg>
</template>
