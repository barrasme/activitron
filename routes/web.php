<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;

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
});

Route::prefix('app')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('dashboard');
    Route::get('/user/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/user/create', [UsersController::class, 'store'])->name('users.store');

    Route::get('/user/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::post('/user/{id}/update', [UsersController::class, 'update'])->name('users.update');

    Route::post('/user/delete', [UsersController::class, 'delete'])->name('users.delete');

    Route::get('/user/{id}/activity', [UsersController::class, 'activity'])->name('users.activity');

})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
