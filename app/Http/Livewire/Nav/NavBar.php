<?php

namespace App\Http\Livewire\Nav;

use Livewire\Component;

class NavBar extends Component
{
    protected $listeners = ['cartAdded', 'removeItem', 'profileUpdate'];
    public function render()
    {
        return view('livewire.nav.nav-bar');
    }

    public function cartAdded() {
        
    }

    public function removeItem() {
        
    }

    public function profileUpdate() {
        
    }
}
