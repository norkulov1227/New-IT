<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MarketComponent extends Component
{
    public function render()
    {
        return view('livewire.market-component')->layout('layouts.layout');
    }
}
