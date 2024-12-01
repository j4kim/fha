<script setup>
import ApplicationLogo from "./components/ApplicationLogo.vue";
import Breadcrumbs from "./components/Breadcrumbs.vue";
import DropdownMenu from "./components/DropdownMenu.vue";
</script>

<template>
    <div class="min-h-screen bg-gray-100">
        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div
                class="max-w-7xl mx-auto min-h-12 sm:min-h-20 px-4 sm:px-6 lg:px-8 flex items-center gap-4 sm:gap-6 lg:gap-8"
            >
                <RouterLink to="/">
                    <ApplicationLogo
                        class="block h-7 sm:h-9 w-auto fill-current text-gray-800"
                    />
                </RouterLink>
                <Breadcrumbs />
                <div class="grow"></div>
                <DropdownMenu />
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 pb-36">
                <Suspense>
                    <RouterView />
                </Suspense>
            </div>
        </main>
    </div>
</template>
