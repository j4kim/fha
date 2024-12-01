<script setup>
import store from "../store";

function getAttrs(i) {
    const width = 300 - i * 60;
    const center = 316 / 2;
    const x = center - width / 2;
    return { x, y: x, width, height: width };
}
</script>

<template>
    <svg viewBox="0 0 316 316" xmlns="http://www.w3.org/2000/svg">
        <rect
            v-for="i in 6"
            v-bind="getAttrs(i - 1)"
            :style="{
                '--original-angle': 18 * (i - 1) + 'deg',
                '--angle': 18 * (i - 1) + 'deg',
            }"
            :class="{ animate: store.loading }"
        />
    </svg>
</template>

<style scoped>
@keyframes rotate-cw {
    from {
        --angle: var(--original-angle);
    }
    to {
        --angle: calc(var(--original-angle) + 360deg);
    }
}
@property --original-angle {
    initial-value: 0deg;
    inherits: false;
    syntax: "<angle>";
}
@property --angle {
    initial-value: 0deg;
    inherits: false;
    syntax: "<angle>";
}
rect {
    transform: rotate(var(--angle));
    transform-origin: center;
    fill: none;
    stroke-width: 4;
    stroke: currentColor;
}
.animate {
    animation-name: rotate-cw;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
    animation-delay: 0.1s;
}
.animate:nth-child(2) {
    animation-duration: 8s;
}
.animate:nth-child(3) {
    animation-duration: 4s;
}
.animate:nth-child(4) {
    animation-duration: 2s;
}
.animate:nth-child(5) {
    animation-duration: 1s;
}
</style>
