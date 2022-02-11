<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;

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
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/projects', function () {
    return view('projects.index');
})->middleware(['auth'])->name('projects.index');

Route::get('projects/create', [ProjectController::class, 'create'])->name('projects.create')->middleware('role:admin');


Route::get('clients/create', [ClientController::class, 'create'])->name('clients.create')->middleware('role:admin');
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit')->middleware('role:admin|user1|user2|user3');

