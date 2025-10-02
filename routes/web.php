<?php

use App\Http\Controllers\ToDoController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/todos');
Route::resource('/todos', ToDoController::class);
