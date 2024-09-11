<?php

use App\Livewire\Forms\FundForm;
use function Livewire\Volt\{layout,form};

layout("layouts.app");

form(FundForm::class);

$submit = function () {
    $fund = $this->form->store();

    $this->redirect(route('funds.show', $fund->id), navigate: true);
};
?>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <x-breadcrumbs :items="[
            ['text' => __('Funds'), 'href' => route('funds.index')],
            ['text' => __('New')],
        ]" />
    </h2>
</x-slot>

<x-fund-form />