<?php

namespace App\Livewire;

use Livewire\Component;
use Native\Laravel\Facades\Shell;

class Currencies extends Component
{
    public $currencies;

    public function loadCurrencies()
    {
        $this->currencies = [
            [
                'name' => 'USD-COP',
                'status' => 'up',
                'value' => number_format(4120),
                'date' => 1693367544,
            ],
            [
                'name' => 'USD-CAD',
                'status' => 'down',
                'value' => number_format(1520),
                'date' => 1693367544,
            ],
        ];
    }

    public function openCurrency($currency)
    {
        Shell::openExternal(
            'https://www.google.com/finance/quote/' . $currency,
        );
    }

    public function render()
    {
        return view('livewire.currencies');
    }
}
