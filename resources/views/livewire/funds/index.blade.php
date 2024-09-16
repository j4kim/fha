<?php

use App\Models\Fund;
use function Livewire\Volt\{state, layout, computed};

layout("layouts.app");

state(['search'])->url();

$funds = computed(function () {
    $search = strtolower($this->search);
    $query = Fund::query();
    if ($search) {
        $query->where(DB::raw('LOWER(name)'), 'like', "%$search%")
            ->orWhere(DB::raw('LOWER(description)'), 'like', "%$search%")
            ->orWhere(DB::raw('LOWER(ref)'), 'like', "%$search%");
    }
    return $query->get();
});
?>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <x-breadcrumbs :items="['funds.index']" />
    </h2>
    <x-primary-button :href="route('funds.create')" wire:navigate>
        {{ __('New') }}
    </x-primary-button>
</x-slot>

<div>
    <div class="mb-6 flex justify-between items-center">
        <x-text-input
            type="search"
            placeholder="search"
            wire:model.live.debounce.300ms="search"
        />
    </div>
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
            @foreach ($this->funds as $fund)
            <tr href="{{route('funds.show', $fund->id)}}" wire:navigate class="cursor-pointer">
                <td>{{ $fund->id }}</td>
                <td>{{ $fund->ref }}</td>
                <td>{{ $fund->name }}</td>
                <td class="hidden sm:table-cell text-sm lg:text-base">{{ $fund->description }}</td>
                <td>{{ $fund->status }}</td>
                <td class="hidden md:table-cell">{{ $fund->updated_at->format("d.m.y H:i") }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>