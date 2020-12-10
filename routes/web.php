<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TasksController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth:sanctum', 'verified'])->group(function(){
   
    Route::get('/dashboard',[ProjectController::class, 'index'])->name('dashboard');


Route::resource('projects', ProjectController::class);
Route::post('/projects/add-tasks', [ProjectController::class, 'addTasks'])->name('projects.add-tasks');
Route::post('/projects/{project}/tasks', [ProjectController::class, 'getTasks'])->name('projects.get-tasks');

Route::resource('tasks', TasksController::class);
Route::get('/task', [TasksController::class, 'create']);
Route::post('/task', [TasksController::class, 'store']);

Route::get('/task/{task}', [TasksController::class, 'edit']);
Route::post('/task/{task}', [TasksController::class, 'update']);

// });