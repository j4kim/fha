<script setup>
import Dropdown from "./Dropdown.vue";
import DropdownLink from "./DropdownLink.vue";
import MenuIcon from "../icons/MenuIcon.vue";
import router from "../router";
import store from "../store";

const user = window.user;
</script>

<template>
    <a v-if="user" href="/_/profile" class="text-sm text-gray-500 hover:text-gray-700">
        {{ user.name }}
    </a>
    <Dropdown align="right" width="48">
        <template #trigger>
            <button class="text-gray-500 hover:text-gray-700 block">
                <MenuIcon class="h-5 sm:h-6" />
            </button>
        </template>

        <template v-if="store.menu?.length">
            <DropdownLink
                v-for="item in store.menu"
                @click="router.push(item.route)"
            >
                {{ item.text }}
            </DropdownLink>
            <div class="border-b"></div>
        </template>

        <DropdownLink @click="router.push('/')"> Dashboard </DropdownLink>

        <DropdownLink @click="router.push('/funds')"> Funds </DropdownLink>

        <div class="border-b"></div>

        <DropdownLink v-if="user" href="/_/profile"> Profile </DropdownLink>

        <DropdownLink v-if="user" href="/logout"> Log out </DropdownLink>

        <DropdownLink v-if="!user" href="/login"> Log in </DropdownLink>
    </Dropdown>
</template>
