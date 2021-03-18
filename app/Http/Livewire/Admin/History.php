<?php

namespace App\Http\Livewire\Admin;

use App\Models\Process;
use Livewire\Component;

class History extends Component
{
    public $history;
    public function mount(Process $history) {
        $this->history = $history;
    }
    public function render()
    {
        return view('livewire.admin.history');
    }

    public function back() {
        return redirect()->route('order-product');
    }
}
