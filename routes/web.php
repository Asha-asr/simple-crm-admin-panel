<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

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

Route::get('/tasks', function () {
    return view('tasks.index');
})->middleware(['auth'])->name('tasks.index');


Route::get('clients/index', [ClientController::class, 'index'])->name('clients.index');
Route::get('clients/create', [ClientController::class, 'create'])->name('clients.create')->middleware('role:admin');
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit')->middleware('role:admin|user1|user2|user3');
Route::post('clients/createnew', [ClientController::class, 'store'])->name('clients.store')->middleware('role:admin');
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update')->middleware('role:admin|user1|user2|user3');
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy')->middleware('role:admin');

Route::get('projects/index', [ProjectController::class, 'index'])->name('projects.index');
Route::get('projects/create', [ProjectController::class, 'create'])->name('projects.create')->middleware('role:admin');
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit')->middleware('role:admin|user1|user2|user3');
Route::post('projects/createnew', [ProjectController::class, 'store'])->name('projects.store')->middleware('role:admin');
Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update')->middleware('role:admin|user1|user2|user3');
Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy')->middleware('role:admin');

Route::get('tasks/index', [TaskController::class, 'index'])->name('tasks.index');
Route::get('tasks/create', [TaskController::class, 'create'])->name('tasks.create')->middleware('role:admin');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit')->middleware('role:admin|user1|user2|user3');
Route::post('tasks/createnew', [TaskController::class, 'store'])->name('tasks.store')->middleware('role:admin');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update')->middleware('role:admin|user1|user2|user3');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy')->middleware('role:admin');
// Route::resource('projects', \App\Http\Controllers\ProjectController::class);
// Route::resource('tasks', \App\Http\Controllers\TaskController::class);