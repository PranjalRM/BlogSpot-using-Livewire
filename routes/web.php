<?php

use App\Livewire\Posts;
use App\Livewire\Login;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;
use App\Livewire\Blog;
use App\Livewire\Myblog;
use App\Livewire\Editprofile;

Route::view('/','home');
Route::get('/blog',Blog::class);
Route::get('/myblog',Myblog::class)->name('myblog');
Route::get('/myblog/edit/{postId}',Myblog::class)->name('myblog.edit');
Route::get('/myblog/{postId}',Myblog::class)->name('myblog.view');

Route::get('/posts/create', Posts::class)->name('posts.create');

Route::get('/profile/edit/profile', EditProfile::class)->name('profile.edit');
Route::get('/password/edit/password', EditProfile::class)->name('password.edit');


Route::get('/post/{slug}',Posts::class)->name('posts.edit');
Route::get('/login',Login::class)->name('login');
Route::post('/logout',[Login::class,'logout'])->name('logout');
Route::get('/register',Register::class)->name('register');

// Auth::routes();
