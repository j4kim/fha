<?php

use App\Livewire\Forms\FundForm;
use function Livewire\Volt\{layout,form};

layout("layouts.app");

form(FundForm::class);

$createFund = function () {
    $fund = $this->form->store();

    $this->redirect(route('funds.show', $fund->id), navigate: true);
};
?>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <a href="{{ route('funds.index') }}" wire:navigate class="text-indigo-700">
            {{ __('Funds') }}
        </a>
        >
        <span>New</span>
    </h2>
</x-slot>


<form wire:submit="createFund" class="flex flex-col gap-4">
    <div>
        <x-input-label for="ref" :value="__('Ref')" />
        <x-text-input wire:model="form.ref" id="ref" name="ref" type="text" class="mt-1 block w-full" required autofocus />
        <x-input-error class="mt-2" :messages="$errors->get('form.ref')" />
    </div>

    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input wire:model="form.name" id="name" name="name" type="text" class="mt-1 block w-full" required autofocus />
        <x-input-error class="mt-2" :messages="$errors->get('form.name')" />
    </div>

    <div>
        <x-input-label for="description" :value="__('Description')" />
        <x-text-input wire:model="form.description" id="description" name="description" type="text" class="mt-1 block w-full" required />
        <x-input-error class="mt-2" :messages="$errors->get('form.description')" />
    </div>

    <div>
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
</form>