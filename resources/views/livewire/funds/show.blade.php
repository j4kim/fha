<?php

use App\Models\Fund;
use function Livewire\Volt\{state, mount, layout};

layout("layouts.app");

state([
    'fund'
]);

mount(function(Fund $fund){
    $this->fund = $fund;
});

$deleteFund = function(){
    $this->fund->delete();
    $this->redirect(route('funds.index'), navigate: true);
}
?>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <a href="{{ route('funds.index') }}" wire:navigate class="text-indigo-700">
            {{ __('Funds') }}
        </a>
        >
        <span>{{ $fund->ref }}</span>
    </h2>
    <x-primary-button :href="route('funds.update', $fund->id)" wire:navigate>
        {{ __('Update') }}
    </x-primary-button>
</x-slot>

<div class="flex flex-col gap-4">
    <x-attr label="Ref" :value="$fund->ref" />
    <x-attr label="Name" :value="$fund->name" />
    <x-attr label="Description" :value="$fund->description" />
    <div>
        <x-danger-button
            wire:confirm="Are you sure you want to delete this fund?"
            wire:click="deleteFund"
        >
            {{ __('Delete') }}
        </x-danger-button>
    </div>
</div>