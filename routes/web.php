<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormFieldController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubmitformController;
use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// route for urls
Route::resource('urls', UrlController::class)
    ->middleware(['auth', 'verified']);



// Route::get('{shortener_url}', [UrlController::class, 'shortenLink'])->name('shortener-url');

Route::get('shorten/{shortener_url}', [UrlController::class, 'shortenLink'])->name('shortener-url');





Route::resource('categories', CategoryController::class);



Route::resource('formfields', FormFieldController::class);

Route::resource('submitforms', SubmitformController::class);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
