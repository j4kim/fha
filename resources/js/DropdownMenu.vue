<script setup>
import Dropdown from "./Dropdown.vue";
import DropdownLink from "./DropdownLink.vue";
import MenuIcon from "./MenuIcon.vue";
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

        <DropdownLink> Dashboard </DropdownLink>

        <DropdownLink> Funds </DropdownLink>

        <div class="border-b"></div>

        <DropdownLink> Profile </DropdownLink>

        <DropdownLink> Log out </DropdownLink>

        <DropdownLink> Log in </DropdownLink>
    </Dropdown>
</template>
