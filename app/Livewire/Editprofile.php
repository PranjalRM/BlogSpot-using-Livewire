<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class Editprofile extends Component
{
    public $name;
    public $email;
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function updateProfileAndPassword()
    {
        $user = auth()->user();
        $this->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . auth()->id(),
            'current_password' => 'nullable|string|min:8',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);

        if (!empty($this->name) && $this->name !== $user->name) {
            $user->name = $this->name;
            $user->save();
            session()->flash('message', 'Name updated successfully.');
            return redirect('/myblog');
        }

        if (!empty($this->email) && $this->email !== $user->email) {
            $user->email = $this->email;
            $user->save();
            session()->flash('message', 'Email updated successfully.You will be redirected to login page.');
            $this->dispatch('logout');
            return;
        }

        if (!empty($this->current_password) && !empty($this->new_password)) {
            if (Hash::check($this->current_password, $user->password)) {
                $user->password = Hash::make($this->new_password);
                $user->save();
                session()->flash('message', 'Password updated successfully.You will be redirected to login page.');
                $this->dispatch('logout');
                return;
            } else {
                session()->flash('error', 'Current password is incorrect.Try Again!!');
                return;
            }
        }

        session()->flash('error', 'No changes detected.');
    }
    
    public function logoutUser()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.editprofile')
            ->extends('layouts.app')
            ->section('content');
    }
}
