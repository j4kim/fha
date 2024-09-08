<?php

use App\Models\Fund;
use function Livewire\Volt\state;

$funds = Fund::all();

state([
    'funds' => $funds,
]);

?>

<table>
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