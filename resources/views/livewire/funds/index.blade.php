<?php

use App\Models\Fund;
use function Livewire\Volt\{state, layout};

layout("layouts.app");

state([
    'funds' => Fund::all(),
]);
?>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Funds') }}
    </h2>
</x-slot>

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
        @foreach ($funds as $fund)
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
