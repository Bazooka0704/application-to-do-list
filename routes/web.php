<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [TaskController::class,'index'])->name('tasks.index');

Route::post('tasks', [TaskController::class,'store'])->name('tasks.store');
Route::post('updatetasks', [TaskController::class,'update'])->name('tasks.update');
Route::post('deletetasks', [TaskController::class,'destroy'])->name('tasks.destroy');

Route::post('trueendtask', [TaskController::class,'endTrue'])->name('tasks.endtrue');
Route::post('falseendtask', [TaskController::class,'endFalse'])->name('tasks.endfalse');
