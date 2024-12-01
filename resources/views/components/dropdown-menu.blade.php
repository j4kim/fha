<x-dropdown align="right" width="48">
    <x-slot name="trigger">
        <button class="text-gray-500 hover:text-gray-700 block">
            <x-icons.menu class="h-5 sm:h-6" />
        </button>
    </x-slot>

    <x-slot name="content">
        @if (!$slot->isEmpty())
            {{ $slot }}
            <div class="border-b"></div>
        @endif

        <x-dropdown-link href="/">
            {{ __('Dashboard') }}
        </x-dropdown-link>

        <x-dropdown-link href="/funds">
            {{ __('Funds') }}
        </x-dropdown-link>

        <div class="border-b"></div>

        @auth
            <x-dropdown-link :href="route('profile')" wire:navigate>
                {{ __('Profile') }}
            </x-dropdown-link>

            <livewire:logout-button />
        @else
            <x-dropdown-link :href="route('login')" wire:navigate>
                {{ __('Log in') }}
            </x-dropdown-link>
        @endauth
    </x-slot>
</x-dropdown>
