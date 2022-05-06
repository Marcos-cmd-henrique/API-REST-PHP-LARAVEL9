<?php

use App\Mail\NotifyMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\SearchController;

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

Route::any('/posts/search', [SearchController::class, 'search'])->middleware(['auth'])->name('posts.search');
Route::get('/posts/create', [PostController::class, 'create'])->middleware(['auth'])->name('posts.create');
Route::put('/posts/{id}', [PostController::class, 'update'])->middleware(['auth'])->name('posts.update');
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->middleware(['auth'])->name('posts.edit');
Route::delete('posts/{id}', [PostController::class, 'destroy'])->middleware(['auth'])->name('posts.destroy');
Route::get('/logout', function(){ Auth::logout(); return Redirect::to('/');})->middleware(['auth'])->name('logout');
Route::get('/posts/{id}', [PostController::class, 'show'])->middleware(['auth'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store'])->middleware(['auth'])->name ('post.store');
Route::get('/posts', [PostController::class, 'index'])->middleware(['auth'])->name('posts.index');


Route::get('/', function () 
{
    return view('auth/login');
});

Route::get('/dashboard', function () 
{
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('envio-email', function()
    {
        Mail::to(auth()->user()->email)->send(new NotifyMail());
});
