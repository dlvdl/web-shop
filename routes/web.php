<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\StoreFront;
use App\Livewire\Product;

Route::get('/', StoreFront::class)->name('home');
Route::get('/product/{product}', Product::class)->name('product');

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});
