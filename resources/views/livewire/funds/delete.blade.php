<?php

use App\Models\Fund;
use function Livewire\Volt\{state,mount};

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
    <x-breadcrumbs :items="['funds.index', $fund, 'Delete']" />
</x-slot>

<form wire:submit="delete">
    <p class="mb-2">
        {{ __("Are you sure you want to delete this fund?") }}
    </p>
    <x-danger-button>
        {{ __("Yes, delete") }}
    </x-danger-button>
</form>