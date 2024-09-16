<?php

use function Livewire\Volt\{layout};

layout("layouts.app");
?>

<x-slot name="header">
    {{ __('Dashboard') }}
</x-slot>

<div>
    Hello
</div>
