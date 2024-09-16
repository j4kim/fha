<?php

use App\Models\Fund;
use function Livewire\Volt\{state, mount};

state([
    'fund'
]);

mount(function(Fund $fund){
    $this->fund = $fund;
});
?>

<x-slot name="header">
    <x-breadcrumbs :items="['funds.index', $fund]" />
</x-slot>

<x-slot name="menu">
    <x-dropdown-link :href="route('funds.update', $fund->id)" wire:navigate>
        {{ __('Update fund') }}
    </x-dropdown-link>
    <x-dropdown-link :href="route('funds.delete', $fund->id)" wire:navigate>
        {{ __('Delete fund') }}
    </x-dropdown-link>
</x-slot>

<div class="flex flex-col gap-6">
    <div class="grid grid-cols-1 sm:grid-cols-6 gap-4">
        <x-attr label="Ref" :value="$fund->ref" />
        <x-attr label="Name" :value="$fund->name" />
        <x-attr label="Description" :value="$fund->description" class="sm:col-span-4" valueclass="whitespace-pre-line"/>
    </div>

    <div class="flex flex-col gap-4">
        <h3 class="font-semibold text-xl text-gray-800">Lots dans ce fond</h3>
        <table class="table w-full">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ref</th>
                    <th>Name</th>
                    <th class="hidden sm:table-cell">Description</th>
                    <th>Status</th>
                    <th class="hidden md:table-cell">Update</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->fund->lots as $lot)
                <tr href="{{route('lots.show', [$lot->fund_id, $lot->id])}}" wire:navigate class="cursor-pointer">
                    <td>{{ $lot->id }}</td>
                    <td>{{ $lot->ref }}</td>
                    <td>{{ $lot->name }}</td>
                    <td class="hidden sm:table-cell text-sm lg:text-base">{{ $lot->description }}</td>
                    <td>{{ $lot->status }}</td>
                    <td class="hidden md:table-cell">{{ $lot->updated_at->format("d.m.y H:i") }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>