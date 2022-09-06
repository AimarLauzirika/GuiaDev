<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubjectController;
use App\Http\Livewire\PostCreate;
use App\Http\Livewire\PostForm;
use App\Http\Livewire\PostsIndex;
use App\Http\Livewire\SubjectShow;
use App\Http\Livewire\SubjectsIndex;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/subjects', SubjectsIndex::class)->name('subjects.index');
// Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
Route::get('/subjects/{subject}', [SubjectController::class, 'show'])->name('subjects.show');
Route::get('/subjects/{subject}', SubjectShow::class)->name('subjects.show');
// Route::get('/subjects/{subject}/edit', SubjectEdit::class)->name('subjects.edit');

Route::get('posts', PostsIndex::class)->name('posts.index');
Route::get('posts/create', PostForm::class)->name('posts.create');
Route::get('posts/{post}/edit', PostForm::class)->name('posts.edit');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');