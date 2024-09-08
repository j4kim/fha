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

<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>ref</th>
            <th>name</th>
            <th>description</th>
            <th>status</th>
            <th>updated_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($funds as $fund)
        <tr href="{{route('funds.show', $fund->id)}}" wire:navigate class="cursor-pointer">
            <td>{{ $fund->id }}</td>
            <td>{{ $fund->ref }}</td>
            <td>{{ $fund->name }}</td>
            <td>{{ $fund->description }}</td>
            <td>{{ $fund->status }}</td>
            <td>{{ $fund->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
