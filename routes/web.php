<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Calculator;
use App\Livewire\TodoList;
use App\Livewire\ProductSearch;
use App\Livewire\CascadingDopdown;



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

 Route::get('/calculator', Calculator::class)->name('calculator');
 Route::get('/todo-list', TodoList::class)->name('todo-list');
 Route::get('/cascading-dropdown', CascadingDopdown::class)->name('cascading-dropdown');
 Route::get('/products', ProductSearch::class)->name('products');



