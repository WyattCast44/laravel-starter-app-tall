<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name = "";

    public $email = "";

    public $password = "";

    public $password_confirmation = "";

    public function register()
    {
        $this->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));

        Auth::login($user, $remember = true);

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('auth.register')
            ->extends('layouts.auth')
            ->section('content');
    }
}
