<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules= [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function login()
    {
        $this->validate();

        if(Auth::attempt(['email' => $this->email,'password' => $this->password], $this->remember))
        {
            session()->regenerate();
            session()->flash('message', 'You have successfully logged in!');
            return redirect()->intended('/');
        }
        throw ValidationException::withMessages([
            'email' => 'Invalid credentials',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        session()->forget(['id']);
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.login')
        ->extends('layouts.app')
        ->section('content');
    }
}
