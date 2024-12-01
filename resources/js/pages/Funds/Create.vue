<script setup>
import { post } from "../../api";
import store from "../../store";
import router from "../../router";

store.breadcrumbs = [{ text: "Funds", route: "/funds/" }, { text: "New" }];
store.menu = [];

const form = {
    ref: "",
    name: "",
    description: "",
};

async function submit() {
    await post("/api/funds", form);
    router.push("/funds/");
}
</script>

<template>
    <form @submit.prevent="submit" class="flex flex-col gap-4">
        <div>
            <label for="ref" class="block font-medium text-sm text-gray-700">
                Ref
            </label>
            <input
                v-model="form.ref"
                id="ref"
                name="ref"
                type="text"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required
                autofocus
            />
        </div>

        <div>
            <label for="name" class="block font-medium text-sm text-gray-700">
                Name
            </label>
            <input
                v-model="form.name"
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required
            />
        </div>

        <div>
            <label
                for="description"
                class="block font-medium text-sm text-gray-700"
            >
                Description
            </label>
            <textarea
                v-model="form.description"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required
            ></textarea>
        </div>

        <div>
            <button
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
            >
                Save
            </button>
        </div>
    </form>
</template>
