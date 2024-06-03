<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportEvents\Events;

class Myblog extends Component
{
    public $posts;
    public $postId;
    public $editTitle;
    public $editBody;
    public $editAccess;
    public $editImage;
    public $postIdToDelete;

    protected $listeners = ['deleteConfirmed'=>'deletePost'];

    public function mount($postId = null)
    {
        if ($postId)
        {
            $this->editPost($postId);
        } else {
            $this->posts = $this->getUserPost();
        }
    }

    protected function getUserPost()
    {
            $userId=Auth::id();
            return Post::where('user_id', $userId)->get();
    }

    public function editPost($postId)
    {
        $post = Post::find($postId);
        if($post) 
        {
            $this->postId = $postId;
            $this->editTitle = $post->title;
            $this->editBody = $post->body;
            $this->editAccess = $post->access;
            $this->editImage = $post->image;
        }
    }

    public function updatePost()
    {
        $this->validate([
            'editTitle' => 'required|min:3',
            'editBody' => 'required|min:10',
            'editAccess' => 'required',
        ]);

        $post = Post::find($this->postId);
        $post->update([
            'title' => $this->editTitle,
            'body' => $this->editBody,
            'access' => $this->editAccess,
        ]);

        session()->flash('message','Post updated successfully');

        $this->postId = null;
        $this->editTitle = null;
        $this->editBody = null;
        $this->editAccess = null;;

        $this->posts = $this->getUserPost();
    }

    public function deleteConfirmation($postId)
    {
        $this->postIdToDelete = $postId;

        $this->dispatch('deleteConfirmation');
    }     

    public function deletePost()
    {
        $post = Post::find($this->postIdToDelete);
        $post->delete();
        
        $this->dispatch('postDeleted');
        $this->postIdToDelete = null; // Reset deletion state
        $this->posts = $this->getUserPost(); // Refresh posts
    }


    public function render()
    {
        return view('livewire.myblog')
            ->extends('layouts.app')
            ->section('content');
    }
}
