<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\ToDoListController;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('lists', [ToDoListController::class, 'list'])->name('lists.list');
    Route::get('lists/add', [ToDoListController::class, 'create'])->name('lists.create');
    Route::get('lists/{id}', [ToDoListController::class, 'show'])->whereNumber('id')->name('list.show');
    Route::get('lists/{id}/completed', [ToDoListController::class, 'show_completed'])->whereNumber('id')->name('list.show.completed');
    Route::get('lists/{id}/nocompleted', [ToDoListController::class, 'show_nocompleted'])->whereNumber('id')->name('list.show.nocompleted');
    Route::get('lists/{id}/running', [ToDoListController::class, 'show_running'])->whereNumber('id')->name('list.show.running');
    Route::get('lists/{listid}/todos/{todoid}', [ToDoController::class, 'show'])->whereNumber(['listid', 'todoid'])->name('todo.show');
    Route::post('lists/add', [ToDoListController::class, 'add'])->name('lists.add');
    Route::get('list/{id}/todos/create', [ToDoController::class, 'create'])->whereNumber('id')->name('todo.create');
    Route::post('list/{id}/todos/create', [ToDoController::class, 'add'])->whereNumber('id')->name('todo.add');
    Route::post('todo/complete/{id}', [ToDoController::class, 'complete']);
    Route::post('lists/close/{id}', [ToDoListController::class, 'close']);
    Route::get('lists/saved', [ToDoListController::class, 'list_saved'])->whereNumber('id')->name('lists.show.saved');
    Route::get('lists/unsaved', [ToDoListController::class, 'list_unsaved'])->name('lists.show.unsaved');
});
