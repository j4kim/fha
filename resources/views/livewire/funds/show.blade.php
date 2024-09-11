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

<div class="flex flex-col gap-6">
    <div class="flex flex-col gap-4">
        <x-attr label="Ref" :value="$fund->ref" />
        <x-attr label="Name" :value="$fund->name" />
        <x-attr label="Description" :value="$fund->description" class="whitespace-pre-line"/>
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