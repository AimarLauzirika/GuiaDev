<?php

use App\Http\Controllers\PostController;
use App\Http\Livewire\PostForm;
use App\Http\Livewire\PostsIndex;
use App\Http\Livewire\SubjectShow;
use App\Http\Livewire\SubjectsIndex;
use App\Http\Livewire\UserPostsIndex;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', UserPostsIndex::class)->middleware('auth')->name('dashboard');

Route::get('/subjects', SubjectsIndex::class)->name('subjects.index');
Route::get('/subjects/{subject}', SubjectShow::class)->name('subjects.show');

Route::get('posts', PostsIndex::class)->name('posts.index');
Route::get('posts/create', PostForm::class)->middleware('auth')->name('posts.create');
Route::get('posts/{post}/edit', PostForm::class)->middleware('auth')->name('posts.edit');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
