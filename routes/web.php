<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\PagesController;
use Illuminate\Routing\Router;
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



Route::get('/', [ContactsController::class, 'index'])->name('contact.index');

Route::post('/', [ContactsController::class, 'store'])->name('contact.store');
Route::get('/create', [ContactsController::class, 'create'])->name('contact.create');

Route::get('/{contact}/edit', [ContactsController::class, 'edit'])->name('contact.edit');
Route::put('/{contact}', [ContactsController::class, 'update'])->name('contact.update');

Route::delete('/{contact}', [ContactsController::class, 'destroy'])->name('contact.destroy');

require __DIR__.'/auth.php';
