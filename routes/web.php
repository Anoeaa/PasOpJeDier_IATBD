<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin', 'banned'])->group(function() {
    Route::get('/admin', 'App\Http\Controllers\AdminController@show');
    Route::post('/admin', 'App\Http\Controllers\AdminController@ban');

    Route::get('/adminRemove/{id}', 'App\Http\Controllers\AdminController@removeAnimal');
});

Route::middleware(['auth', 'banned'])->group(function() {
    Route::get('/', 'App\Http\Controllers\UserController@animalList');
    Route::get('/user/{id}', 'App\Http\Controllers\UserController@userProfile');

    Route::get('/uploadImage', 'App\Http\Controllers\UserController@uploadImage');
    Route::post('/uploadImage', 'App\Http\Controllers\UserController@saveImage');

    Route::get('/apply', 'App\Http\Controllers\AnimalController@makeApplication');
    Route::post('/apply', 'App\Http\Controllers\AnimalController@saveApplication');

    Route::get('/animal/{id}', 'App\Http\Controllers\AnimalController@animalProfile');
    Route::post('/animal/{id}', 'App\Http\Controllers\AnimalController@animalApply');

    Route::get('/removeAnimal/{id}', 'App\Http\Controllers\AnimalController@removeAnimal');

    Route::get('/refuseApp/{id}', 'App\Http\Controllers\UserController@rejectApplication');
    Route::get('/acceptApp/{id}/{animal}', 'App\Http\Controllers\UserController@acceptApplication');

    Route::get('/review/{id}', 'App\Http\Controllers\UserController@makeReview');
    Route::post('/review/{id}', 'App\Http\Controllers\UserController@saveReview');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/banned', 'App\Http\Controllers\UserController@bannedUser');
}); 

require __DIR__.'/auth.php';
