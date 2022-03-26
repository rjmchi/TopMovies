<?php

use App\Http\Controllers\MovieController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::get('/movies/reorder',[App\Http\Controllers\MovieController::class, 'reorder'])->name('movies.reorder');
    Route::put('movie/up/{movie}', [App\Http\Controllers\MovieController::class, 'moveUp'])->name('movie.up');
    Route::put('movie/down/{movie}', [App\Http\Controllers\MovieController::class, 'moveDown'])->name('movie.down');
    Route::resource('movies', MovieController::class);
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
