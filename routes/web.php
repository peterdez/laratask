<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Http\Request;

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

/*Route::get('/', function() {
    return view('welcome');
});*/
Route::get('/', [App\Http\Controllers\TaskController::class, 'index']);
Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index']);
Route::post('/task', [App\Http\Controllers\TaskController::class, 'store']);
Route::delete('/task/{task}', [App\Http\Controllers\TaskController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
