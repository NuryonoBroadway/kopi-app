<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $user;
    public $name;
    public $email;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function render()
    {      
        return view('livewire.user.profile', ['users' => $this->user]);
    }

    public function logout() {
        Auth::logout();

        session()->flash('status', 'Logout Success');
        return redirect()->route('home');
    }

    public function updateContact() {
        $profile = User::find($this->user->id);
        $profile->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);
        $this->emit('profileUpdate');
        session()->flash('message', 'Profile Updated');
    }
}
