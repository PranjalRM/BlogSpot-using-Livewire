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
    public $new_password,$new_password_confirmation;
    public $confirm_password;
    public $activeForm = 'password';

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function switchForm($form)
    {
        $this->activeForm = $form;
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();

        session()->flash('message','Profile updated successfully!');
    }

    public function updatePassword()
    {
        // dd($this->all());
         $this->validate([
            'current_password' => 'required',
            'new_password' => ['required','min:4','confirmed'],
            // 'new_password_confirmation' => 'required|same:new_password',
        ]);
       
        $user = Auth::user();

        if (!Hash::check($this->current_password,$user->password)){
            $this->addError('current_password','The current password is incorrect.');
            return;
        }

        $user->password = Hash::make($this->new_password);
        $user->save();
        
        session()->flash('message','Password updated successfully!');
        $this->reset();
    }
    
    public function render()
    {
        return view('livewire.editprofile')
            ->extends('layouts.app')
            ->section('content');
    }


}
