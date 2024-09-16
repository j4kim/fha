<?php

use App\Models\Fund;
use function Livewire\Volt\{state};

state([
    'funds' => Fund::orderBy('updated_at', 'desc')->limit(5)->get(),
]);
?>

<x-slot name="header">
    <x-breadcrumbs :items="['Dashboard']" />
</x-slot>

<div class="block sm:grid grid-cols-2">
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg space-y-4">
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Recently updated funds') }}
            </h2>
        </header>

        <div>
            @foreach ($this->funds as $fund)
                <a href="{{ route('funds.show', $fund->id) }}" class="block p-2 hover:bg-gray-100" wire:navigate>
                    <span>{{ $fund->ref }}</span>
                    <span class="font-medium">{{ $fund->name }}</span>
                </a>
            @endforeach
        </div>

        <p>
            <a href="{{ route('funds.index') }}" class="text-indigo-700 hover:underline">
                {{ __('View all funds') }}
            </a>
        </p>
    </div>
</div>
