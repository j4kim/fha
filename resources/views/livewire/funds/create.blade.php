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
    <x-breadcrumbs :items="['funds.index', 'New']"/>
</x-slot>

<x-fund-form />