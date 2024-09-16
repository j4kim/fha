<x-dropdown align="right" width="48">
    <x-slot name="trigger">
        <button class="text-gray-500 hover:text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
    </x-slot>

    <x-slot name="content">
        @if (!$slot->isEmpty())
            {{ $slot }}
            <div class="border-b"></div>
        @endif

        <x-dropdown-link :href="route('dashboard')" wire:navigate>
            {{ __('Dashboard') }}
        </x-dropdown-link>

        <x-dropdown-link :href="route('funds.index')" wire:navigate>
            {{ __('Funds') }}
        </x-dropdown-link>

        <div class="border-b"></div>

        @auth
            <x-dropdown-link :href="route('profile')" wire:navigate>
                {{ __('Profile') }}
            </x-dropdown-link>

            <button wire:click="logout" class="w-full text-start">
                <x-dropdown-link>
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </button>
        @else
            <x-dropdown-link :href="route('login')" wire:navigate>
                {{ __('Log in') }}
            </x-dropdown-link>
        @endauth
    </x-slot>
</x-dropdown>