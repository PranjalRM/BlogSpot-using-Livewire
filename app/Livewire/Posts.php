<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post as BlogPost;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Posts extends Component
{
    use WithFileUploads;
    
    public $post;
    public $title;
    public $body;
    public $image;
    public $access = 'public';

    protected $rules = [
        'title' => 'required|min:6',
        'body' => 'required|min:6',
        'image' => 'nullable|image|max:2048',
        'access' => 'required',
    ]; 

    public function mount( $id = null)
    {
        // if(!Auth::check()) 
        // {
        //     return redirect('login');
        // }
        if($id) {
            $this->post = BlogPost::find($id);
            
            if($this->post) 
            {
                $this->title = $this->post->title;
                $this->body = $this->post->body;
                $this->image = $this->post->image;
                $this->access = $this->post->access;
            } else {
                session()->flash('error', 'Invalid access. You do not have permission to view this post.');
                return redirect('/');
            }
        } else {
            $this->post = new Post;
            $this->access = 'public';
        }
        
    }

    public function save()
    {
        $this->validate();
       
        if (!$this->post->exixts)
        {
            $this->post->user_id = Auth::id();
            $this->post->slug = $this->generateUniqueSlug($this->post->title);
        }
       
        $this->post->title = $this->title;
        $this->post->body = $this->body;
        $this->post->access = $this->access;

        if ($this->image) 
        {
            $photoName = uniqid('post') . '.' . $this->image->extension();
            $this->image->storeAs('public/img', $photoName); // Store photo in posts directory
            $this->post->image= 'storage/img/'. $photoName; // Update photo path in post model
        }
        // $this->dispatch('savePost');
        $this->post->save();     
    }

    private function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (Post::where('slug', $slug)->exists())
        {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function render()
    {
        return view('livewire.posts')
            ->extends('layouts.app')
            ->section('content');
    }
}
