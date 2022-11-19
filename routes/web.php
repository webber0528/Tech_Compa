<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(EventController::class)->middleware(['auth'])->group(function()
{
    Route::get('/', 'index')->name('index');
    Route::post('/events', 'store')->name('store');
    Route::get('/events/create', 'create')->name('create');
    Route::get('/events/{event}', 'show')->name('show');
    Route::put('/events/{event}', 'update')->name('update');
    Route::delete('/events/{event}', 'delete')->name('delete');
    Route::get('/events/{event}/edit', 'edit')->name('edit');
});

require __DIR__.'/auth.php';
