@props(['link-component'])

<div {{ $attributes }} >
    @auth
        <x-dynamic-component :component="$linkComponent" :href="route('profile')" wire:navigate>
            {{ __('Profile') }}
        </x-dynamic-component>

        <!-- Authentication -->
        <button wire:click="logout" class="w-full text-start">
            <x-dynamic-component :component="$linkComponent">
                {{ __('Log Out') }}
            </x-dynamic-component>
        </button>
    @else
        <x-dynamic-component :component="$linkComponent" :href="route('login')" wire:navigate>
            {{ __('Log in') }}
        </x-dynamic-component>
    @endauth
</div>