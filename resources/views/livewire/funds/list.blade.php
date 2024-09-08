<?php

use App\Models\Fund;
use function Livewire\Volt\state;

state([
    'funds' => Fund::all(),
]);

?>

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
        <tr>
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