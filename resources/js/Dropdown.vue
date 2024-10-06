<script setup>
import { reactive } from "vue";
import router from "./router";

const props = defineProps({
    align: {
        type: String,
        default: "right",
    },
    contentClasses: {
        type: String,
        default: "py-1 bg-white",
    },
});

var alignmentClasses = "ltr:origin-top-right rtl:origin-top-left end-0";

if (props.align === "left") {
    alignmentClasses = "ltr:origin-top-left rtl:origin-top-right start-0";
} else if (props.align === "top") {
    alignmentClasses = "origin-top";
}

const state = reactive({
    open: false,
});

router.afterEach(() => (state.open = false));
</script>

<template>
    <div class="relative">
        <div @click="state.open = !state.open">
            <slot name="trigger"></slot>
        </div>

        <div
            v-show="state.open"
            class="absolute z-50 mt-2 w-48 rounded-md shadow-lg"
            :class="alignmentClasses"
        >
            <div
                class="rounded-md ring-1 ring-black ring-opacity-5"
                :class="contentClasses"
            >
                <slot></slot>
            </div>
        </div>
    </div>
</template>
