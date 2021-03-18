<?php

namespace App\Http\Livewire\User;

use App\Models\Process;
use Livewire\Component;

class UserHistory extends Component
{
    public function render()
    {
        $history = auth()->user()->history;
        return view('livewire.user.user-history', ['histories' => $history]);
    }

    public function history(Process $history)  {
        return redirect()->route('history', $history);
    }
}
