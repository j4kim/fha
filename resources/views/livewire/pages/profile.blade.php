<x-slot name="header">
    <x-breadcrumbs :items="['Profile']" />
</x-slot>

<div class="flex flex-col gap-6">
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
            <livewire:profile.update-profile-information-form />
        </div>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
            <livewire:profile.update-password-form />
        </div>
    </div>

    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
            <livewire:profile.delete-user-form />
        </div>
    </div>
</div>