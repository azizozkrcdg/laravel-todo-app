<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthcheckMiddleware;
use Illuminate\Support\Facades\Route;


Route::get("/", [UserController::class, "index"]);

Route::prefix("admin")->middleware(AuthcheckMiddleware::class)->group(function () {

    // Route::get("/logout", [TaskController::class, "logout"])->name("logout");
    Route::get("/tasks", [TaskController::class, "index"])->name("getTask");
    Route::get("/taskCreate", [TaskController::class, "create"])->name("taskCreate");

    Route::post("/taskAdd", [TaskController::class, "store"])->name("taskAdd");

    Route::delete("/delete/{id}", [TaskController::class, "destroy"])->name("taskDelete");

    Route::get("/getTaskUpdate/{id}", [TaskController::class, "edit"])->name("getTaskUpdate");
    Route::put("/taskUpdate/{id}", [TaskController::class, "update"])->name("taskUpdate");

    Route::put("/statusUpdate/{id}", [TaskController::class, "statusUpdate"])->name("statusUpdate");

    Route::get("/logout", [UserController::class, "logout"])->name("logout");

    Route::get("/profile", [UserController::class, "profile"])->name("profile");
});


include "user.php";
