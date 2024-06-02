<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Auth;


class Blog extends Component
{
    use WithPagination;

    public function render()
    {
        $posts = Post::where('access','public') 
        ->paginate(5);

        
        return view('livewire.blog', compact('posts'))
        ->extends('layouts.app')
        ->section('content');
    }
}
