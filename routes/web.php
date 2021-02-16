<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::view('/terms', 'terms');
Route::view('/privacy', 'privacy');

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::any('/category/{key}', [App\Http\Controllers\AmazonController::class, 'index'])->name('category');

Route::get('/categories', [App\Http\Controllers\IndexController::class, 'categories'])->name('categories');
Route::get('/loadretailer/{key}', [App\Http\Controllers\IndexController::class, 'retailer'])->name('loadretailer');

Route::get('/search', [App\Http\Controllers\IndexController::class, 'search'])->name('search');
Route::get('/autocomplete', [App\Http\Controllers\IndexController::class, 'autocomplete'])->name('autocomplete');

Route::get('/sitemap', [App\Http\Controllers\SitemapController::class, 'products'])->name('sitemap');

Auth::routes([
    'register' => false, // Register Routes...
    'reset' => false, // Reset Password Routes...
    'verify' => false, // Email Verification Routes...
  ]);


Route::get('/home', [App\Http\Controllers\IndexController::class, 'dataindex'])->name('home');
Route::post('/home/update', [App\Http\Controllers\IndexController::class, 'dataAdd']);

