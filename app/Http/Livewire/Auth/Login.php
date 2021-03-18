<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $rememberMe;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function submit() {
      $this->validate();
      if(!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->rememberMe)) {
        return back()->with('danger', 'Invalid Login details');
      }
      session()->flash('status', 'Welcome back, '. Auth::user()->name);
      $this->resetpasword();
      return redirect()->route('home');
    }

    private function resetpasword() {
      $this->email = null;
      $this->password = null;
    }
}
