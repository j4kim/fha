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
        {{ __('Funds') }} > {{ $fund->ref }}
    </h2>
</x-slot>

<div class="flex flex-col gap-4">
    <x-attr label="Ref" :value="$fund->ref" />
    <x-attr label="Name" :value="$fund->name" />
    <x-attr label="Description" :value="$fund->description" />
</div>