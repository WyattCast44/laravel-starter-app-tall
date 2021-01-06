<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email = "";

    public $password = "";

    public function authenticate()
    {
        $this->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ]);

        $status = Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ]);

        if ($status) {
            return redirect()->route('dashboard');
        }
    }

    public function render()
    {
        return view('auth.login')
            ->extends('layouts.auth')
            ->section('content');
    }
}
