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
?>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <x-breadcrumbs :items="[
            ['text' => __('Funds'), 'href' => route('funds.index')],
            ['text' => $fund->ref],
        ]" />
    </h2>
    <div class="grow"></div>
    <x-primary-button :href="route('funds.update', $fund->id)" wire:navigate>
        {{ __('Update') }}
    </x-primary-button>
    <x-danger-button :href="route('funds.delete', $fund->id)" wire:navigate>
        {{ __('Delete') }}
    </x-danger-button>
</x-slot>

<div class="flex flex-col gap-4">
    <x-attr label="Ref" :value="$fund->ref" />
    <x-attr label="Name" :value="$fund->name" />
    <x-attr label="Description" :value="$fund->description" class="whitespace-pre-line"/>
</div>