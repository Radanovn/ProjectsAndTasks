<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard',[TasksController::class, 'index'])->name('dashboard');


Route::resource('projects', ProjectController::class);
Route::post('/projects/add-tasks', [ProjectController::class, 'addTasks'])->name('projects.add-tasks');
Route::post('/projects/{project}/tasks', [ProjectController::class, 'getTasks'])->name('projects.get-tasks');

Route::resource('tasks', TasksController::class);
Route::get('/task', [TasksController::class, 'create']);
Route::post('/task', [TasksController::class, 'store']);

Route::get('/task/{task}', [TasksController::class, 'edit']);
Route::post('/task/{task}', [TasksController::class, 'update']);

});