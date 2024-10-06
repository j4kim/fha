<script setup>
import Dropdown from "./Dropdown.vue";
import DropdownLink from "./DropdownLink.vue";
import MenuIcon from "./MenuIcon.vue";
import router from "./router";
</script>

<template>
    <Dropdown align="right" width="48">
        <template #trigger>
            <button class="text-gray-500 hover:text-gray-700 block">
                <MenuIcon class="h-5 sm:h-6" />
            </button>
        </template>

        <template v-if="$slots.default">
            <slot></slot>
            <div class="border-b"></div>
        </template>

        <DropdownLink @click="router.push('/')"> Dashboard </DropdownLink>

        <DropdownLink @click="router.push('/funds')"> Funds </DropdownLink>

        <div class="border-b"></div>

        <DropdownLink href="/_/profile"> Profile </DropdownLink>

        <DropdownLink href="/logout"> Log out </DropdownLink>

        <DropdownLink href="/login"> Log in </DropdownLink>
    </Dropdown>
</template>
