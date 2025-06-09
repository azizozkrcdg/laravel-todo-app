<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/tasks", [TaskController::class, "index"])->name("getTask");
Route::get("/taskCreate", [TaskController::class, "create"])->name("taskCreate");

Route::post("/taskAdd", [TaskController::class, "store"])->name("taskAdd");

Route::delete("/delete/{id}", [TaskController::class, "destroy"])->name("taskDelete");
