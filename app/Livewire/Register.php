<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules;


class Register extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:4|confirmed',
    ];

    public function register()
    {
        
        $this->validate();
        $user = User::create([ 
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
    
        event(new Registered($user));
        
        Auth::login($user);
        
        session()->flash('message', 'Registration successful.');
        return redirect('/');
        
    }

    public function render()
    {
        return view('livewire.register')
            ->extends('layouts.app')
            ->section('content');
    }
}
