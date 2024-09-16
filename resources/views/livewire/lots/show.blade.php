<?php

use App\Models\Lot;
use function Livewire\Volt\{state, mount, layout};

layout("layouts.app");

state([
    'lot'
]);

mount(function(Lot $lot){
    $this->lot = $lot;
});
?>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <x-breadcrumbs :items="['funds.index', $lot->fund, $lot]" />
    </h2>
</x-slot>

<div class="flex flex-col gap-6">
    <div class="flex flex-col gap-4">
        <x-attr label="Ref" :value="$lot->ref" />
        <x-attr label="Name" :value="$lot->name" />
        <x-attr label="Description" :value="$lot->description" class="whitespace-pre-line"/>
    </div>
</div>