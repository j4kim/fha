<?php

use App\Models\Fund;
use App\Livewire\Forms\FundForm;
use function Livewire\Volt\{form,mount};

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
    <x-breadcrumbs :items="['funds.index', $form->fund, 'Update']" />
</x-slot>

<x-fund-form />