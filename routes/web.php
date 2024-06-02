<?php

use App\Livewire\Posts;
use App\Livewire\Login;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;
use App\Livewire\Blog;
use App\Livewire\Myblog;
use App\Livewire\Editprofile;
use App\Livewire\Contact;

Route::view('/','home')->name('home');
Route::get('/contact',Contact::class);
Route::get('/blog',Blog::class)->name('blog');
Route::get('/myblog',Myblog::class)->name('myblog');
Route::get('/myblog/edit/{postId}',Myblog::class)->name('myblog.edit');
Route::get('/myblog/{postId}',Myblog::class)->name('myblog.view');

Route::get('/posts/create', Posts::class)->name('posts.create');

Route::get('/profile/edit/profile', EditProfile::class)->name('profile.edit');


Route::get('/post/{id}',Posts::class)
        ->middleware('authorizePrivatePost')
        ->name('posts.edit');
Route::get('/login',Login::class)->name('login');
Route::post('/logout',[Login::class,'logout'])->name('logout');
Route::get('/register',Register::class)->name('register');

