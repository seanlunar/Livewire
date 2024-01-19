<?php

use App\Livewire\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Calculator;
use App\Livewire\TodoList;
use App\Livewire\CascadingDopdown;
use App\Livewire\Showblog;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();

Route::get('/',function(){
    return view('welcome');
 });

 Route::get('/calculator', Calculator::class);
 Route::get('/todos', TodoList::class);
 Route::get('/cascading', CascadingDopdown::class);
 Route::get('blogs', Blog::class);
 Route::get('blogsingle/{blog}', Showblog::class);


