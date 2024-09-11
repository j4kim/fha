<?php

namespace App\Livewire\Forms;

use App\Models\Fund;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FundForm extends Form
{
    public ?Fund $fund;

    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('required|string|max:3')]
    public string $ref = '';

    #[Validate('required|string')]
    public string $description = '';

    public function store()
    {
        $this->validate();

        return Fund::create(
            array_merge($this->all(), ['status' => 'new'])
        );
    }

    public function setFund(Fund $fund)
    {
        $this->fund = $fund;
        $this->fill($fund);
    }

    public function update()
    {
        $validated = $this->validate();
        $this->fund->update($validated);
    }
}
