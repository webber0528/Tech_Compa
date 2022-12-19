<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\RegisterdUserController;
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

  

Route::get('/', [EventController::class,'index'])->middleware('guest')->name('/');
#ゲスト状態のindexページ表示


Route::controller(ChatController::class)->middleware(['auth'])->group(function()
{
Route::get('/chats/','index')->name('chat.users');
Route::post('/chats/{user}','store')->name('chat.store');
Route::get('/chats/{user}','contents')->name('chat.contents');
Route::delete('/chats/{chat}/','delete')->name('chat.delete');
});

Route::controller(EventController::class)->middleware(['auth'])->group(function()
{
    Route::get('/events', 'index')->name('index');
    Route::post('/events', 'store')->name('store');
    Route::get('/events/create', 'create')->name('create');
    Route::get('/events/{event}', 'show')->name('show');
    Route::put('/events/{event}', 'update')->name('update');
    Route::delete('/events/{event}', 'delete')->name('delete');
    Route::get('/events/{event}/edit', 'edit')->name('edit');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
