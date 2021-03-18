<?php

namespace App\Http\Livewire\User;

use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Password extends Component
{
    public $user;
    public $password;
    public $old_password;
    public $password_confirmation;

    public function rules() {
        return [
            'old_password' => ['required', new MatchOldPassword],
            'password' => ['required', 'confirmed', 'min:8', 'regex:/([A-Z])\w+([1-9])\w+/'],
        ];
    }

    public function mount($user) {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.user.password');
    }

    public function updatePassword() {
        $this->validate();
        $this->user->update(['password' => Hash::make($this->password)]);
        session()->flash('message', 'Password updated');
        return redirect()->route('profile', $this->user);
    }
}
