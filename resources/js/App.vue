<script setup>
import ApplicationLogo from "./ApplicationLogo.vue";
import Breadcrumbs from "./Breadcrumbs.vue";
import DropdownMenu from "./DropdownMenu.vue";
import store from "./store";
</script>

<template>
    <div class="min-h-screen bg-gray-100">
        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div
                class="max-w-7xl mx-auto min-h-12 sm:min-h-20 px-4 sm:px-6 lg:px-8 flex items-center gap-4 sm:gap-6 lg:gap-8"
            >
                <a href="/">
                    <ApplicationLogo
                        class="block h-7 sm:h-9 w-auto fill-current text-gray-800"
                    />
                </a>
                <Breadcrumbs />
                <div class="grow"></div>
                <DropdownMenu />
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 pb-36">
                <RouterView v-slot="{ Component }">
                    <template v-if="Component">
                        <Suspense>
                            <!-- main content -->
                            <component :is="Component"></component>

                            <!-- loading state -->
                            <template #fallback> Loading... </template>
                        </Suspense>
                    </template>
                </RouterView>
            </div>
        </main>
    </div>
</template>
