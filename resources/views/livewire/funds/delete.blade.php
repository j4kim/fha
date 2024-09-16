<?php

use App\Models\Fund;
use function Livewire\Volt\{layout,state,mount};

layout("layouts.app");

state([
    'fund'
]);

mount(
    fn(Fund $fund) => $this->fund = $fund
);

$delete = function(){
    $this->fund->delete();
    $this->redirect(route('funds.index'), navigate: true);
};
?>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <x-breadcrumbs :items="['funds.index', $fund, 'Delete']" />
    </h2>
</x-slot>

<form wire:submit="delete">
    <p class="mb-2">
        {{ __("Are you sure you want to delete this fund?") }}
    </p>
    <x-danger-button>
        {{ __("Yes, delete") }}
    </x-danger-button>
</form>