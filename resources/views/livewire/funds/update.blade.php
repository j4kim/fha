<?php

use App\Models\Fund;
use App\Livewire\Forms\FundForm;
use function Livewire\Volt\{layout,form,mount};

layout("layouts.app");

form(FundForm::class);

mount(
    fn(Fund $fund) => $this->form->setFund($fund)
);

$submit = function () {
    $this->form->update();
    $this->redirect(route('funds.show', $this->form->fund->id), navigate: true);
};
?>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <x-breadcrumbs :items="[
            ['text' => __('Funds'), 'href' => route('funds.index')],
            ['text' => $form->fund->ref, 'href' => route('funds.show', $form->fund->id)],
            ['text' => __('Update')],
        ]" />
    </h2>
</x-slot>

<x-fund-form />