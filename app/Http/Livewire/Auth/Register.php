<?php

namespace App\Http\Livewire\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $lname;
    public $fname;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'fname' => 'required',
        'lname' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed|regex:/([A-Z])\w+([1-9])\w+/'
    ];

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function submit() {
        $this->validate();
        $name = $this->fname . " " . $this->lname;

        $user = User::create([
            'name' => $name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $user->roles()->attach(Role::where('name', 'user')->first());

        session()->flash('status', 'Account created');
        return redirect()->route('login');
    }
}
